<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <youtube
                        ref="youtube"
                        width="100%"
                        height="450px"
                        :video-id="vid.videoId"
                        :player-vars="playerVars"
                        @playing="playing"
                        @ended="endVideo"
                ></youtube>
                <br />
                <div class="container-video">
                    <button class="btn btn-danger" @click="play">Play</button>
                    <button class="btn btn-danger" @click="pause">Pause</button>

                    <div class="float-right">
                        <client-only>
                            <social-sharing
                                    :url="url"
                                    :title="vid.title"
                                    description="Intuitive, Fast and Composable MVVM for building interactive interfaces."
                                    quote="Vue is a progressive framework for building user interfaces."
                                    hashtags="vuejs,javascript,framework"
                                    twitter-user="vuejs"
                                    inline-template
                            >
                                <div>
                                    <network network="facebook">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </network>
                                    <network network="twitter">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </network>
                                </div>
                            </social-sharing>
                        </client-only>
                    </div>
                    <br />

                    <h3>{{ vid.title }}</h3>

                    <div class="video-desc" v-html="vid.description"></div>
                </div>
            </div>
            <div class="col-md-3">
                <h1>Next Song Are comming :<br><br></h1>
                <div class="card border-primary"
                     v-for="v in vids"
                     :key="v.id"
                >
                    <img class="card-img-top" :src="v.thumbnail" alt />
                    <div class="card-body">
                        <h4 class="card-title">{{ v.title }}</h4>
                        <p
                                class="card-text"
                                v-html="v.description.substring(0, 50) + '......'"
                        ></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        async asyncData({ $axios, params }) {
        let { video, videos } = await $axios.$get(`/watch/${params.id}`);
        return { vid: video, vids: videos.data }
    },
    data() {
        return {
            playerVars: {
                autoplay: 1,
                modestbranding: 1,
                showinfo: 0
            },
            url: ""
        };
    },
    methods: {
        playing() {
            console.log("o/ we are watching!!!");
        },
        play() {
            this.player.playVideo();
        },
        pause() {
            this.player.pauseVideo();
        },
        endVideo() {
            this.$router.push(`/watch/${this.vids[0].videoId}`);
        }
    },
    computed: {
        player() {
            return this.$refs.youtube.player;
        }
    },
    mounted() {
        this.url = window.location.href;
        // console.log(window.location.href);
    }
    };
</script>
<style>
    iframe {
        width: 100%;
        height: 10%;
    }



    .container-video {
        margin-left: 10%;
    }
    .video-desc {
        margin-top: 2%;
        margin-right: 10%;
        margin-bottom: 2%;
    }
</style>
