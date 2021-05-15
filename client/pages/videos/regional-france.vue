<template>
    <div>
        <div class="bg-image">
        </div>
        <div class="homepage-video">
            <div class="row video-grid">
                <div class="col-md-3 leftBar">
                    <newLeftBar />
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3" v-for="video in videos" :key="video.id" >
                            <div class="card text-left">
                                <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                                    <img class="card-img-top" :src="video.thumbnail" alt=""  >
                                    <div class="card-body">
                                        <h4 class="card-title" >{{ video.title }}</h4>
                                        <p>{{ video.published_at }}</p>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>
<script>
import SideBar from '@/components/SideS'
import newLeftBar from "@/components/newLeftBar";
    export default {
    components: {
            SideBar,
        newLeftBar
        },
        async asyncData ({ $axios, params }) {
            let vid = await $axios.$get(`/videos-regional-france`)
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
}
</style>


