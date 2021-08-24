<template>
    <div class="body">
        <div class="main">
            <div class="heading">
                <!--            <button type="submit" v-on:click=toggleSidebar()>-->
                <!--                <i class="fa fa-bars"></i>Menu</button>-->

                <button type="submit" v-on:click=toggleSidebar()>
                    <i class="fas fa-bars">Menu</i></button>
                <span class="title">Chillwhispers</span>
            </div>
            <newLeftBar/>
            <div class="content">
                <div>
                    <search/>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4"
                             v-for="video in videos" :key="video.id">
                            <div class="category-card">
                                <img class="card-img-top" :src="video.thumbnail" alt="">
                                <nuxt-link :to="`/watch/${video.videoId}`">


                                    <div v-if="video.title.length < 20">
                                        <a href="#category-link" class="category">
                                            {{ video.title }}
                                        </a>

                                    </div>
                                    <div v-else>
                                        <h6 style="width: 200px;
    word-break: normal;"> {{ video.title }}</h6>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
    export default {
    components: {
        search,
        newLeftBar
        },
        async asyncData ({ $axios, params }) {
        let vid = await $axios.$get(`/videos-jazzy`)
        let chann = await $axios.$get(`/channels`)
        return { videos: vid.data, channels: chann.data }
    },

        head () {
            return {
                title: 'ChillHop | Chill All Genre',
                meta: [
                    { hid: 'description', name: 'description', content: 'this is your description' }
                ]
            }
        },

    }
</script>
<style scoped>
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
    width: 300px;
}
</style>



