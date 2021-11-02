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
        search,
        newLeftBar
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

</style>
