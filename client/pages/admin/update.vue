<template>
    <div class="video-container-insert">
        <b-nav>
            <!--<nuxt-link to="localhost:3000">Home page</nuxt-link>
      -->
            <ul>
                <li>
                    <a href="http://localhost:3000">Home</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000">Ambient</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000">ChillStep</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000">ChillOut</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000">ChillHop</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000">Home</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="http://localhost:3000/Search">Search</a>
                </li>
            </ul>

            <!--<a href="http://localhost:3000">II</a>-->
        </b-nav>
        <h1>Video Insert Zone</h1>
        <form @submit.prevent="save">
            <div class="form-group">
                <label>Update</label>
                <input
                        type="text"
                        class="form-control"
                        placeholder="https://www.youtube.com/watch?v=qFkNATtc3mc"
                        required
                        v-model="form.video"
                />
                <br>
                <br>

                <input
                        type="text"
                        class="form-control"
                        placeholder="from 1 to 12 "
                        required
                        v-model="form.category"
                />

                <div class="row">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6">

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
        middleware: ["auth"],
        layout: "MenuAdmin",
        data() {
            return {
                errors: [],
                categories: [],
                subcategories: [],
                form: {
                    video: "",
                    category: null,
                    subcategories: []
                }
            };
        },
        mounted() {
            this.getCategories();
        },
        methods: {
            save() {
                this.errors = [];
                this.$axios
                    .post("/admin/update-video", this.form)
                    .then(response => {
                        if (response.status == 200) {
                            this.$notify({
                                group: "notification",
                                title: "Important message",
                                text: "Video Update Success",
                                type: "success"
                            });
                        }
                        this.form.video = "";
                        this.form.category = '';
                        this.form.subcategories = [];
                    })
                  ;
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
