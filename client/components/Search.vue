<template>
    <div class="container-search mt-3 mb-3">
        <client-only>
            <div class="row">

                <div class="col-md-10">
                    <autocomplete
                        :search="searchVideo"
                        placeholder="Search Video"
                        :get-result-value="getResultValue"
                        @submit="onSubmit"
                    >

                    </autocomplete>
                </div>
                <div class="col-md-2" style="">
                    <div
                        v-if="$auth.loggedIn"
                        style="color:white;"
                        class="text-center"
                    >
                        {{ $auth.user.name }} <br />
                        <button @click="$auth.logout()">Logout</button>
                    </div>
                    <div v-else>
                        <nuxt-link to="/login">
                            <button type="button" class="btn btn-primary"> Login </button>

                        </nuxt-link>
                    </div>

                </div>
            </div>

        </client-only>
        <!-- <input type="text" placeholder="Search" v-model="search" /> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            search: "",
            data: [],
            timeOut: null
        };
    },
    // watch: {
    //     search() {
    //         this.searchVideo();
    //     }
    // },
    methods: {
        searchVideo(input) {
            return new Promise(resolve => {
                if (input.length < 1) {
                    return resolve([]);
                }
                if (this.timeOut) {
                    clearTimeout(this.timeOut);
                }
                this.timeOut = setTimeout(() => {
                    this.$axios
                        .post("/search-elastic", {
                            search: input
                        })
                        .then(response => {
                            resolve(response.data.data);
                            console.log(response.data);
                        });
                }, 200);

                // fetch(`${process.env.baseUrl}search-elastic`)
                //     .then(response => response.json())
                //     .then(data => {
                //         resolve(data.data.videos);
                //     });
            });
            // this.$axios
            //     .post("/search-elastic", {
            //         search: this.search
            //     })
            //     .then(response => {
            //         return response.data;
            //         console.log(response.data);
            //     });
        },
        getResultValue(result) {
            return result.title;
        },
        onSubmit(result) {
            this.$router.push(`/watch?v=${result.videoId}`);
        }
    }
};
</script>

<style></style>
