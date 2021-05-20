<template>
    <div class="c container-fluid">
        <div class="row">
            <div
                class="col-md-2 leftBar d-lg-block d-none d-md-block d-lg-none"
            >
                <newLeftBar />
            </div>

            <!-- Video Container -->
            <div class="offset-md-2 col-md-6">
                <search />
                <div class="container-tags">
                    <span
                        class="badge badge-primary"
                        style="cursor:pointer"
                        v-for="(tag, index) in vid.tags.slice(0, 10)"
                        :key="`${index}tag  `"
                        @click.prevent="clickTags(tag.id)"
                    >
                        {{ tag.name.substring(0, 12) }}...
                    </span>

                    <br />
                    <youtube
                        ref="youtube"
                        width="100%"
                        height="450px"
                        :video-id="vid.videoId"
                        :player-vars="playerVars"
                        @playing="playing"
                        @ended="endVideo"
                        @cued="errorVideo"
                    >
                    </youtube>
                    <h3 class="title">{{ vid.title }}</h3>
                    <div class="video-desc" v-html="vid.description"></div>
                </div>
            </div>
            <!-- Next Video -->
            <div class="col-md-4 next-list">
                <h1 style="color: white">
                    {{ nextSongText }} :
                    <br />
                    <br />
                </h1>

                <div
                    class="card"
                    style="cursor:pointer"
                    v-for="(tv, index) in tagvids"
                    :key="`${index}v`"
                    @click.prevent="gotoWatch(tv.videoId)"
                >
                    <img class="card-img-top" :src="tv.thumbnail" alt />
                    <div class="card-body">
                        <h4 class="card-title">{{ tv.title }}</h4>
                        <!-- <p
                class="card-text"
                v-html="v.description.substring(0, 50) + '......'"
              >
              </p> -->
                    </div>
                </div>
                <div
                    class="card"
                    style="cursor:pointer"
                    v-for="(v, index) in vids"
                    :key="`${index}v`"
                    @click.prevent="gotoWatch(v.videoId)"
                >
                    <img class="card-img-top" :src="v.thumbnail" alt />
                    <div class="card-body">
                        <h4 class="card-title">{{ v.title }}</h4>
                        <!-- <p
                class="card-text"
                v-html="v.description.substring(0, 50) + '......'"
              >
              </p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SideBar from "@/components/SideBar";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
export default {
    components: {
        SideBar,
        newLeftBar,
        search
    },
    async asyncData({ $axios, params, query }) {
        if (query) {
            let { video, videos } = await $axios.$get(`/watch/${query.v}`);
            return { vid: video, vids: videos };
        }
    },
    data() {
        return {
            nextSongText: "Next Song Are comming",
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
            url: "",
            vid: {},
            tagvids: []
        };
    },
    head() {
        return {
            title: this.vid.title,
            meta: [
                {
                    hid: "description",
                    name: "description",
                    content: this.vid.description.substring(0, 300)
                },
                {
                    hid: "keywords",
                    name: "keywords",
                    content:
                        "chillwhispers, video, calm music, music, music video,"
                },
                {
                    hid: "og:title",
                    name: "og:title",
                    content: "Chillwhispers music videos"
                },
                {
                    hid: "og:type",
                    name: "og:type",
                    content: "music"
                },
                {
                    hid: "og:url",
                    name: "og:url",
                    content: "https://chillwhispers.com"
                },
                {
                    hid: "og:image",
                    name: "og:image",
                    content: this.vid.thumbnail
                },
                {
                    hid: "og:site_name",
                    name: "og:site_name",
                    content: "chillwhispers"
                },
                {
                    hid: "og:description",
                    name: "og:description",
                    content: this.vid.description.substring(0, 300)
                },
                {
                    hid: "twitter:card",
                    name: "twitter:card",
                    content: this.vid.title
                },
                {
                    hid: "twitter:url",
                    name: "twitter:url",
                    content: `https://chillwhispers.com/watch/${this.vid.videoId}`
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
                    content: this.vid.description.substring(0, 300)
                },

                {
                    hid: "twitter:image",
                    name: "twitter:image",
                    content: this.vid.thumbnail
                },

                {
                    hid: "twitter:app:url:iphone",
                    name: "twitter:app:url:iphone",
                    content: `https://www.youtube.com/embed/${this.vid.videoId}`
                },
                {
                    hid: "twitter:app:url:ipad",
                    name: "twitter:app:url:ipad",
                    content: `https://www.youtube.com/embed/${this.vid.videoId}`
                },

                {
                    hid: "twitter:app:url:googleplay",
                    name: "twitter:app:url:googleplay",
                    content: `https://www.youtube.com/embed/${this.vid.videoId}`
                },
                {
                    hid: "twitter:player",
                    name: "twitter:player",
                    content: `https://www.youtube.com/embed/${this.vid.videoId}`
                }
            ]
        };
    },

    computed: {
        player() {
            return this.$refs.youtube.player;
        },
        query() {
            return this.$route.query.v;
        }
    },
    watch: {
        query: {
            // This will let Vue know to look inside the array
            deep: true,

            // We have to move our method to a handler field
            handler() {
                this.gotoWatch(this.$route.query.v);
            }
        }
    },
    mounted() {
        this.getPlaylist();
        this.url = window.location.href;
        this.addToHistory();
        // console.log(window.location.href);
    },
    methods: {
        // autoplay: 1,
        clickTags(id) {
            this.$axios
                .post("/tag/get-videos", {
                    id: id
                })
                .then(response => {
                    // this.$router.push(
                    //     `/watch?v=${this.$route.query.v}&tag=${id}` <--- this not work because there is watch handler
                    // );
                    this.tagvids = response.data.videos;
                    this.nextSongText = `Comming next from ${response.data.tag.name} Tag`;
                });
        },
        errorVideo() {
            console.log("error");
        },
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
            this.vid = this.vids[0];

            this.$router.push(`/watch?v=${this.vid.videoId}`);
            this.player.playVideo();

            this.vids.splice(0, 1);
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
        },
        gotoWatch(v) {
            window.scrollTo(0, 0);
            this.$router.push(`/watch?v=${v}`);
            this.$axios.get(`/watch/${v}`).then(response => {
                this.vid = response.data.video;
                this.vids = response.data.videos;
            });
            this.addToHistory();
        },
        addToHistory() {
            var data = this.vid;
            this.$store.dispatch("history/addVideoToHistory", data);
        }
    }
};
</script>
<style scoped>
.c {
    padding-left: 3%;
    padding-top: 50px;
    background: url("~assets/background.png");
    height: 1560px;
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}

.col-md-5 {
    color: green;
}

.card {
    background-color: transparent;
    background-color: none;
}
.card {
    background-color: transparent;
    background-color: none;
    border: none;
}
.card-body h4,
.card-body p {
    font-size: bold;
    color: #dadada;
}
.card-body p {
    color: purple;
}

.card img {
    border-radius: 40px;
}

p {
    color: red;
}

.card {
    background-color: transparent;
    background-color: none;
}
.card-body h4,
.card-body p {
    font-size: bold;
    color: #dadada;
}
.card-body p {
    color: purple;
}

/*  YT BAR */

.ytp-chrome-bottom.ytp-volume-slider-active {
    display: none;
}

.next-list {
    background-color: #482139;
    border-top-left-radius: 50px;
}
.next-list h1 {
    padding-top: 20px;
}
.badge-primary {
    color: #fff;
    background-color: #007bff;
    padding: 10px;
    margin-right: 10px;
    margin-bottom: 15px;
    font-size: 1.2em;
}
.video-desc {
    color: white;
    margin-left: 50px;
}

.title {
    font-size: 1.5em;
    color: white;
    font-weight: bold;
    margin-top: 2em;
}
</style>
