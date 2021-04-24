<template>
  <div class="row">
  <div class="col-md-2 leftBar">    <newLeftBar />
  </div>
  <div class="col-md-9">
        <h1>Video Insert Zone</h1>
        <p>Let K.i.s.s(Keep it stupid simple),just copy youtube link in form,chouse category and subcategory and click on save.
        </p>
        <p>
    P.S any summision it's moderate in this moment.
        <form @submit.prevent="save">
            <div class="form-group">
                <label>Insert Video Id</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="https://www.youtube.com/watch?v=qFkNATtc3mc"
                    required
                    v-model="form.video"
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
                                track-by="name"
                                label="name"
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
                                    <strong>{{ option.name }}</strong>
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
    </div>    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import SideBar from '@/components/SideS'
import newLeftBar from "@/components/newLeftBar";
export default {
    components: {
        Multiselect,
        SideBar,
        newLeftBar
    },
  //  middleware: ["auth"],
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
                .post("/suggest/add-video", this.form)
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
                    this.form.category = '';
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

<style>
.video-container-insert {

    margin-top: 0%;

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

.leftBar {
    background-color: #090909;
    /* position: fixed; */
    /* margin-right: 100px; */
    margin-top: 0px;
    height: 100%;
    color: #8422a6;
    border-top-right-radius: 50px;
    /* opacity: 0.4; */
    height: 1600px;
    width: 110px;
    /* position: fixed; */
    z-index: 1;
    top: 0;
    /* left: 0; */
    /* background-color: #111; */
    overflow-x: hidden;
    padding-top: 50px;
    /* margin-left: 35px; */
    padding-bottom: 20px;
    padding-left: 50px;
}
</style>
