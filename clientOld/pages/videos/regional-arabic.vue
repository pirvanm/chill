<template>
    <div class="body">
        <div class="main">
            <div class="heading">
                <!--            <button type="submit" v-on:click=toggleSidebar()>-->
                <!--                <i class="fa fa-bars"></i>Menu</button>-->

                <button type="submit" v-on:click=toggleSidebar()>
                    <i class="fas fa-bars"></i></button>
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
         newLeftBar, search
        },
        async asyncData ({ $axios, params }) {
            let vid = await $axios.$get(`/videos-regional-arabic`)
            let chann = await $axios.$get(`/channels`)
            return { videos: vid.data, channels: chann.data }
        },

    }
</script>
<style>
.leftBar {
    background-color: #090909;
    margin-top: 0px;
    color: #8422a6;
    border-top-right-radius: 50px;
    height: 1600px;
    width: 110px;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 50px;
    padding-bottom: 20px;
    padding-left: 50px;
    width: 300px;
}
</style>


