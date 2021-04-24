<template>
<!--    <div class="video-container-insert">-->
<!--        <b-nav>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="http://localhost:3000">Home</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="http://localhost:3000">Ambient</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="http://localhost:3000">ChillStep</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="/">ChillOut</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="/">ChillHop</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="/">Home</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <nuxt-link to="/Search">Search</nuxt-link>-->
<!--                </li>-->
<!--            </ul>-->

<!--            &lt;!&ndash;<nuxt-link to="http://localhost:3000">II</nuxt-link>&ndash;&gt;-->
<!--        </b-nav>-->

<!--    </div>-->

    <div id="tabs" class="container">

        <div class="tabs">
            <a v-on:click="activetab='1'" v-bind:class="[ activetab === '1' ? 'active' : '' ]">France</a>
            <a v-on:click="activetab='2'" v-bind:class="[ activetab === '2' ? 'active' : '' ]">Spain</a>
            <a v-on:click="activetab='3'" v-bind:class="[ activetab === '3' ? 'active' : '' ]">Germany           </a>
            <a v-on:click="activetab='4'" v-bind:class="[ activetab === '4' ? 'active' : '' ]">Italy</a>
        </div>


        <div class="content">
            <div v-if="activetab ==='1'" class="tabcontent">
                <stat/>
            </div>
            <div v-if="activetab ==='2'" class="tabcontent">
                Channel
            </div>
            <div v-if="activetab ==='3'" class="tabcontent">

            </div>
            <div v-if="activetab ==='4'" class="tabcontent">

            </div>
        </div>

    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import Stat from "./stat";
// import Videos from 'videos';
export default {
    components: {
        Multiselect,
        Stat

    },
    //  middleware: ["auth"],
    layout: "MenuAdmin",
    data() {
        return {
            activetab: '1' ,
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
