<template>


    <div>


        Video Admin


        <h1>Video Insert Zone</h1>
        <youtube
            ref="youtube"
            width="100%"
            height="450px"
            :video-id="videoId"
            :player-vars="playerVars"
            @playing="playing"
        ></youtube>
        <form @submit.prevent="save">
            <div class="form-group">
                <label>Insert Video Id</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="https://www.youtube.com/watch?v=qFkNATtc3mc"
                    required
                    v-model="form.video"
                    @change="getVideoId"
                />
                <span class="text-danger" v-if="errors.video">{{
                        errors.video[0]
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
                            :taggable="true"
                            @tag="addCategory"
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
                            :taggable="true"
                            @tag="addSubCategory"
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

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
    components: {
        Multiselect
    },
    //  middleware: ["auth"],
    layout: "MenuAdmin",
    data() {
        return {
            playerVars: {
                autoplay: 1,
                modestbranding: 1,
                showinfo: 0
            },
            errors: [],
            categories: [],
            subcategories: [],
            form: {
                video: "",
                category: null,
                subcategories: []
            },
            videoId: ""
        };
    },
    mounted() {
        this.getCategories();
    },

    methods: {
        playing() {
            console.log("playing");
        },
        getVideoId() {
            var regExp = /^https?\:\/\/(?:www\.youtube(?:\-nocookie)?\.com\/|m\.youtube\.com\/|youtube\.com\/)?(?:ytscreeningroom\?vi?=|youtu\.be\/|vi?\/|user\/.+\/u\/\w{1,2}\/|embed\/|watch\?(?:.*\&)?vi?=|\&vi?=|\?(?:.*\&)?vi?=)([^#\&\?\n\/<>"']*)/i;
            var match = this.form.video.match(regExp);

            // return (match && match[1].length==11)? match[1] : false;
            // console.log(match && match[1].length == 11 ? match[1] : false);
            this.videoId = match && match[1].length == 11 ? match[1] : false;
        },
        save() {
            this.errors = [];
            this.$axios
                .post("/admin/add-video", this.form)
                .then(response => {
                    if (response.status == 200) {
                        this.$notify({
                            group: "notification",
                            title: "Important message",
                            text: "Video Added Success",
                            type: "success"
                        });
                    }
                    this.form.video = "";
                    this.form.category = "";
                    this.form.subcategories = [];
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        getCategories() {
            this.$axios.get("categories").then(response => {
                this.categories = response.data.categories;
            });
        },
        addCategory(event) {
            this.$axios
                .post("/category", {
                    name: event
                })
                .then(response => {
                    this.categories.push(response.data.category);
                    this.form.category = response.data.category;
                });
        },
        getSubCategoryWithCategory(event) {
            console.log(event.id);

            this.$axios
                .get(`/subcategories-with-category/${event.id}`)
                .then(response => {
                    this.subcategories = response.data.subcategories;
                });
        },
        addSubCategory(event) {
            let vm = this;
            if (vm.form.category) {
                vm.$axios
                    .post("/subcategory", {
                        category: vm.form.category,
                        name: event
                    })
                    .then(response => {
                        vm.subcategories.push(response.data.subcategory);
                        vm.form.subcategories.push(response.data.subcategory);
                    });
            } else {
                vm.$notify({
                    group: "notification",
                    title: "Important message",
                    text: "Please select category before add subcategory",
                    type: "error"
                });
            }
        }
    }

};
</script>
