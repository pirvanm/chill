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

                <div class="row">
                    <div class="col-md-6">
                        <label>Select or Create Category</label>
                        <multiselect
                            v-model="form.category"
                            deselect-label="Can't remove this value"
                            track-by="category_name"
                            label="category_name"
                            placeholder="Select one"
                            :options="categories"
                            :searchable="true"
                            :allow-empty="false"
                            @select="getSubCategoryWithCategory"
                        >
                            <template
                                slot="singleLabel"
                                slot-scope="{ option }"
                            >
                                <strong>{{ option.category_name }}</strong>
                            </template>
                        </multiselect>
                    </div>

                    <div class="col-md-6">
                        <label>Select or Create Subcategory</label>
                        <multiselect
                            v-model="form.subcategories"
                            deselect-label="Can't remove this value"
                            track-by="name"
                            label="name"
                            :multiple="true"
                            placeholder="Select one"
                            :options="subcategories"
                            :searchable="true"
                            :allow-empty="false"
                        >
                            <template
                                slot="singleLabel"
                                slot-scope="{ option }"
                            >
                                <strong>{{ option.name }}</strong>
                            </template>
                        </multiselect>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success" :disabled="busy">
                {{ pageInfo.nextPageToken ? "Next" : "Save" }}
            </button>
            <p v-if="busy">Loading...</p>
        </form>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
    middleware: ["admin"],
    components: {
        Multiselect
    },
    layout: "MenuAdmin",
    data() {
        return {
            errors: [],
            busy: false,
            form: {
                channel: "",
                category: null,
                subcategories: []
            },
            pageInfo: {},
            page: 0,
            categories: [],
            subcategories: []
        };
    },
    mounted() {
        this.getCategories();
    },

    methods: {
        save() {
            this.errors = [];
            this.busy = true;
            this.$axios
                .post("/admin/add-channel-videos", {
                    channel: this.form.channel,
                    category: this.form.category,
                    subcategories: this.form.subcategories,
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
        },

        getSubCategoryWithCategory(event) {
            this.$axios
                .get(`/subcategories-with-category/${event.id}`)
                .then(response => {
                    this.subcategories = response.data.subcategories;
                });
        },
        getCategories() {
            this.$axios.get("categories").then(response => {
                this.categories = response.data.categories;
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
