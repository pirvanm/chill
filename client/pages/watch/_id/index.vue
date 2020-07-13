<template>
    <div class="container video-section">
        <div class="row">
            <div class="offset-col-md-1 col-md-1 vertical-menu">
                <a href="/" css="logo">
                    <i class="fas fa-headphones"></i>
                    Chill Whispelars
                </a>
                <ul class="list-home">
                    <li>
                        <i class="fas fa-home"></i> Home
                    </li>
                </ul>

                <ul class="list-videos">
                    <li>
                        <a href="/videos">
                            <i class="fa fa-music"></i> Latest Videos
                        </a>
                    </li>

                    <li>
                        <a href="/videos/ambiental">Ambiental Videos</a>
                    </li>
                    <li>
                        <a href="/videos/chillhop">ChillHop Videos</a>
                    </li>
                    <li>
                        <a href="/videos/chillout">ChillOut Videos</a>
                    </li>

                    <li>
                        <a href="/videos/chillstep">Chillstep Videos</a>
                    </li>

                    <li>
                        <a href="/videos/classic">Classic Videos</a>
                    </li>
                    <li>
                        <a href="/videos/classical">Classical Videos</a>
                    </li>
                    <li>
                        <a href="/videos/downtempo">Downtempo Videos</a>
                    </li>
                    <li>
                        <a href="/videos/lofi">Lofi Videos</a>
                    </li>
                    <li>
                        <a href="/videos/lounge">Lounge Videos</a>
                    </li>

                    <li>
                        <a href="/videos/regional">Regional Videos</a>
                    </li>

                    <li>
                        <a href="/videos/trap">Trap Videos</a>
                    </li>

                    <li>
                        <a href="/videos/world">World Videos</a>
                    </li>
                </ul>

                <ul class="list-helpfull">
                    <li>HelpFull</li>

                    <li>Contact</li>
                    <li>Suport</li>
                    <li>Suggestion</li>
                </ul>

                <ul class="social-list">
                    <h1>Follow Us!</h1>
                    <li>
                        <a href="https://twitter.com/chill_whisper">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Chill-Whisper-317341858891377/?modal=admin_todo_tour">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                </ul>
            </div>
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
                <br />
                <div class="container-video">
                    <a class="btn btn-danger" @click="play">
                        <i class="fas fa-play"></i>
                    </a>
                    <a class="btn" @click="pause">
                        <i class="fas fa-pause"></i>
                    </a>
                    <!--
                              <button class="btn " @click="lastVideo"><i class="fas fa-backward"></i></button>
                    -->
                    <button class="btn" @click="nextVideo">
                        <i class="fas fa-forward"></i>
                    </button>
                    <div class="float-right">
                        <b-dropdown id="dropdown-1" text="Add to playlist" class="m-md-2">
                            <b-dropdown-item @click="createNewPlaylist">Create new Playlist</b-dropdown-item>
                            <b-dropdown-item
                                    @click="AddVideoToPlayList(playlist.slug)"
                                    v-for="(playlist, index) in playlists"
                                    :key="index"
                            >{{ playlist.name }}</b-dropdown-item>
                        </b-dropdown>
                    </div>
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

                    <div class="float-right">
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
                    </div>
                    <br />

                    <h3>{{ vid.title }}</h3>

                    <div class="video-desc" v-html="vid.description"></div>
                </div>
            </div>
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
                <b-modal id="create-playlist" title="Create Play list" hide-footer>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                                type="text"
                                id="name"
                                class="form-control"
                                placeholder="name"
                                v-model="form.name"
                        />
                        <!-- <small id="helpId" class="text-muted">Help text</small> -->
                    </div>
                    <b-button @click="savePlaylist" class="btn-success" :disabled="this.busy">Save</b-button>
                    <b-button
                            @click="this.$bvModal.hide(`create-playlist`);"
                            class="float-right btn-danger"
                    >Cancle</b-button>
                    <!-- <button>Submit</button> -->
                </b-modal>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
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
    .video-section {
        margin-top: 20px;
    }
    iframe {
        width: 100%;
        height: 600px;
    }

    a.logo {
        text-align: center;
        background-color: black;
        font-size: 17px;
        font-weight: bold;
        color: white;
        padding: 5px;
        margin-bottom: 23px;
        margin-top: 53px;
        border-radius: 8px;
        margin-left: -23px;
    }
    .list-home {
        margin-top: 10px;
    }

    .container-video {
        margin-left: 10%;
    }
    .video-desc {
        margin-top: 2%;
        margin-right: 10%;
        margin-bottom: 2%;
    }
    .border-primary {
        margin-top: 10px;
    }
    @media (min-width: 1600px) {
        .container {
            max-width: 100%;
        }
    }

    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

    #main {
        transition: margin-left 0.5s;
        padding: 16px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }
        .sidebar a {
            font-size: 18px;
        }
    }
</style>
