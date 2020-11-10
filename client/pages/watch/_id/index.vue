<template>
    <div>

       <!-- NavBar -->
       <div class="row container-navbar">

       </div>
        <!-- Container -->
    <div class="row container-general-video">
    
         <!-- Left Side Bar -->
<SideBar/>

          <!-- Video Container -->
          <div class="col-md-6">

  <youtube
                        ref="youtube"
                        width="100%"
                        height="450px"
                        :video-id="vid.videoId"
                        :player-vars="playerVars"
                        @playing="playing"
                        @ended="endVideo"
                ></youtube>

     <h3>{{ vid.title }}</h3>

                    <div class="video-desc" v-html="vid.description"></div>
          </div>
           <!-- Next Video -->
                     <div class="col-md-4">
<h1>
                    Next Song Are comming :
                    <br />
                    <br />
                </h1>

                <div class="card border-primary" v-for="v in vids" :key="v.id">
                    <a :href="`/watch/${vid.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="v.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ v.title }}</h4>
                            <p class="card-text" v-html="v.description.substring(0, 50) + '......'"></p>
                        </div>
                    </a>
                </div>
          </div>
    </div>
    </div>
</template>

<script>
  import SideBar from '@/components/SideBar'
    export default {
        components: {
            SideBar
        },
        async asyncData({ $axios, params }) {
            let { video, videos } = await $axios.$get(`/watch/${params.id}`);
            return { vid: video, vids: videos.data };
        },
        head() {
            return {
                title: this.vid.title,
                meta: [
                    { charset: "utf-8" },
                    {
                        hid: "viewport",
                        name: "viewport",
                        content: "width=device-width, initial-scale=1"
                    },
                    /* Twitter Meta */
                    {
                        hid: "twitter:card",
                        name: "twitter:card",
                        content: "Cryptocurrency Compare Tool | 2amigOS"
                    },
                    { hid: "twitter:site", name: "twitter:site", content: "@youtube" },
                    {
                        hid: "twitter:url",
                        name: "twitter:url",
                        content: "https://www.youtube.com/watch?v=" + this.vid.videoId
                    },
                    {
                        hid: "twitter:creator",
                        name: "twitter:creator",
                        content: "@2amtech"
                    },
                    {
                        hid: "twitter:title",
                        name: "twitter:title",
                        content: this.vid.title
                    },
                    {
                        hid: "twitter:description",
                        name: "twitter:description",
                        content: this.vid.description
                    },

                    {
                        hid: "twitter:image",
                        name: "twitter:image",
                        content: this.vid.thumbnail
                    },
                    {
                        hid: "twitter:app:name:iphone",
                        name: "twitter:app:name:iphone",
                        content: "YouTube"
                    },
                    {
                        hid: "twitter:app:id:iphone",
                        name: "twitter:app:id:iphone",
                        content: 544007664
                    },
                    {
                        hid: "twitter:app:name:ipad",
                        name: "twitter:app:name:ipad",
                        content: "Youtube"
                    },
                    {
                        hid: "twitter:app:id:ipad",
                        name: "twitter:app:id:ipad",
                        content: 544007664
                    },

                    {
                        hid: "twitter:app:url:iphone",
                        name: "twitter:app:url:iphone",
                        content: "vnd.youtube://www.youtube.com/watch?v=" + this.vid.videoId
                    },
                    {
                        hid: "twitter:app:url:ipad",
                        name: "twitter:app:url:ipad",
                        content: "vnd.youtube://www.youtube.com/watch?v=" + this.vid.videoId
                    },
                    {
                        hid: "twitter:app:name:googleplay",
                        name: "twitter:app:name:googleplay",
                        content: "Youtube"
                    },
                    {
                        hid: "twitter:app:name:googleplay",
                        name: "twitter:app:name:googleplay",
                        content: "com.google.android.youtube"
                    },
                    {
                        hid: "twitter:app:url:googleplay",
                        name: "twitter:app:url:googleplay",
                        content: "https://www.youtube.com/watch?v=" + this.vid.videoId
                    },
                    {
                        hid: "twitter:player",
                        name: "twitter:player",
                        content: "https://www.youtube.com/watch?v=" + this.vid.videoId
                    },
                    {
                        hid: "twitter:player:width",
                        name: "twitter:player:width",
                        content: "1280"
                    },
                    {
                        hid: "twitter:player:height",
                        name: "twitter:player:height",
                        content: "720"
                    },

                    {
                        hid: "og:image",
                        property: "og:image",
                        content: "/crypto-ticker-snapshot.png"
                    },
                    {
                        hid: "og:site_name",
                        name: "og:site_name",
                        content: "2amigOS Crypto Ticker"
                    },
                    { hid: "og:title", name: "og:title", content: "Crypto Ticker" }
                ]
            };
        },
        data() {
            return {
                busy: false,
                playlists: [],
                form: {
                    name: ""
                },
                playerVars: {
                    autoplay: 1,
                    modestbranding: 1,
                    showinfo: 0
                },
                url: ""
            };
        },

        methods: {
            autoplay: 1,
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
                this.player.playVideo();
            },

            nextVideo() {
                this.$router.push(`/watch/${this.vids[0].videoId}`);
                this.player.playVideo();
            },
            lastVideo() {
                //this.$router.pop(`/watch/${this.vids[0].videoId}`);
                // this.player.playVideo();
            },
            getPlaylist() {
                this.$axios.get("/playlists").then(response => {
                    this.playlists = response.data.data;
                    console.log(response);
                });
            },
            createNewPlaylist() {
                this.$bvModal.show(`create-playlist`);
            },
            savePlaylist() {
                this.busy = true;
                this.$axios
                    .post("/playlists", {
                        name: this.form.name
                    })
                    .then(response => {
                        this.busy = false;
                        this.getPlaylist();
                        console.log(response);
                    });
            },
            AddVideoToPlayList(slug) {
                this.$axios
                    .post("/add-to-playlists", {
                        playlist: slug,
                        video: this.$route.params.id
                    })
                    .then(response => {
                        console.log(response);
                    });
            }
        },
        computed: {
            player() {
                return this.$refs.youtube.player;
            }
        },
        mounted() {
            this.getPlaylist();
            this.url = window.location.href;
            // console.log(window.location.href);
        }
    };
</script>
<style>

</style>
