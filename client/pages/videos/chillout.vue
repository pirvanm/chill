<template>
    <div>
        <div class="bg-image">
        </div>
        <div class="homepage-video">
            <div class="row video-grid">
                <div class="col-md-2"><SideBar/>
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
    export default {
    components: {
            SideBar
        },
        async asyncData ({ $axios, params }) {
        let vid = await $axios.$get(`/videos-chillout`)
        let chann = await $axios.$get(`/channels`)
        return { videos: vid.data, channels: chann.data }
    },

    }
</script>



<style>
    ul.nav a
    {
        font-size:15px;
        margin-top: 20px;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .card {
        margin-bottom: 50px;
        min-height: 200px;
        height: 365px;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }
    .video-grid{
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 2%;
    }

    .bg-info {
        background-color: #1034a6!important;
    }

    .navbar-dark .navbar-brand {
        color: #fd5e53;
    }

    .rigth-link{
        margin-right: 40px;
    }
    iframe
    {
        width: 100%;

    }
</style>
