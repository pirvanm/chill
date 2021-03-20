<template>
    <div class="video-container-insert">
        <h1>Channel Insert Zone</h1>

        <h1 class="text-right" v-if="pageInfo">
            Total Video : {{ pageInfo.totalResults }}
            <br />
            Page: {{ page }}
        </h1>
        <form @submit.prevent="save">
            <div class="form-group">
                <label>Channel Id</label>
                <input
                    type="text"
                    class="form-control"
                    required
                    v-model="form.channel"
                    :disabled="pageInfo.nextPageToken"
                />
                <span class="text-danger" v-if="errors.channel">{{
                    errors.channel[0]
                }}</span>
            </div>

            <button type="submit" class="btn btn-success" :disabled="busy">
                {{ pageInfo.nextPageToken ? "Next" : "Save" }}
            </button>
            <p v-if="busy">Loading...</p>
        </form>
    </div>
</template>

<script>
export default {
    //  middleware: ["auth"],
    layout: "MenuAdmin",
    data() {
        return {
            errors: [],
            busy: false,
            form: {
                channel: ""
            },
            pageInfo: {},
            page: 0
        };
    },

    methods: {
        save() {
            this.errors = [];
            this.busy = true;
            this.$axios
                .post("/admin/add-channel-videos", {
                    channel: this.form.channel,
                    token: this.pageInfo ? this.pageInfo.nextPageToken : null
                })
                .then(response => {
                    if (response.status == 200) {
                        this.$notify({
                            group: "notification",
                            title: "Important message",
                            text: "Video Added Success",
                            type: "success"
                        });
                        if (response.data.pageInfo.nextPageToken) {
                            this.page++;
                        } else {
                            this.page = 0;
                            this.form.channel = "";
                        }
                        this.pageInfo = response.data.pageInfo;
                        this.busy = false;
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.busy = false;
                });
        }
    }
};
</script>

<style>
.video-container-insert {
    margin-left: 5%;
    margin-top: 0%;
    margin-right: 5%;
}
.category {
    margin-top: 20px;
}
div select {
    margin-top: 15px;
}
.cat {
    margin-top: 30px;
}
.sub {
    margin-top: 40px;
}
select.category {
    margin-top: 50px;
}
</style>
