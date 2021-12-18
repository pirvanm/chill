<template>
    <div class="body">
        <div class="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="">
                    <div v-if="vids.length">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wrapper embed-responsive embed-responsive-4by3"
                                >
                                    <youtube
                                        ref="youtube"
                                        width="560"
                                        height="315"
                                        :video-id="vid.videoId"
                                        :player-vars="playerVars"
                                        @ended="endVideo"
                                        class="player embed-responsive-item"
                                    >
                                    </youtube>
                                    </div>
                                    <div class="container">
                                     <h3 class="title sm-mt-0">{{ vid.title }}</h3>
                               

                                <div class="mt-3 mb-3 text-center">
                                    <span @click="play" :class="isPlay ? 'pink' : 'white'">
                                        <i class="fas fa-play fa-2x"></i>
                                    </span>

                                    <span
                                        @click="pause"
                                        :class="isPause ? 'pink' : 'white'"
                                    >
                                        <i class="fas fa-pause fa-2x"></i>
                                    </span>

                                    <span @click="nextVideo" class="cursor">
                                        <i class="fas fa-forward fa-2x"></i>
                                    </span>

                                    <span @click="triggerLoop" :class="loop ? 'pink' : 'white'">
                                        <i class="fas fa-redo-alt fa-2x"></i>
                                    </span>
                                </div>
                                <div>
                                </div>

                            </div>
                            <div class="col-md-4"> 
                                <div
                                    class="video-card mb-4"
                                    v-for="(v, index) in vids"
                                    :key="`${index}v`"
                                    @click.prevent="gotoWatch(v.videoId)"
                                >
                                    <img :src="v.thumbnail" />
                                    <p class="title">{{ v.title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
    props: ["vid", "vids", "categories"],
    data() {
        return {
            innerWidth: 0,
            loop: false,
            isPlay: true,
            isPause: false,
            showModal: false,
            isAdmin: false,
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
            tagvids: [],
            update: {
                category: 1
            }
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
        this.checkAdmin();
    },
    created() {
        if (process.browser) {
            window.addEventListener("resize", this.handleResize);
            this.handleResize();
        }
    },
    destroyed() {
        window.removeEventListener("resize", this.handleResize);
    },
    methods: {
        handleResize() {
            this.innerWidth = window.innerWidth;
        },
        triggerLoop() {
            if (this.loop) {
                this.loop = false;
            } else {
                this.loop = true;
            }
        },
        checkAdmin() {
            if (this.$auth.loggedIn) {
                this.isAdmin = this.$auth.user.isAdmin;
            }
        },
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

        play() {
            this.player.playVideo();
        },
        pause() {
            this.player.pauseVideo();
        },
        endVideo() {
            if (this.loop) {
                this.player.playVideo();
            } else {
                this.vid = this.vids[0];

                this.$router.push(`/watch?v=${this.vid.videoId}`);
                this.player.playVideo();

                this.vids.splice(0, 1);
            }
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
                });
        },
        updateVideo(index) {
            this.$bvModal.show(`modal-${index}v`);
        },
        saveCategory(video, modal) {
            this.$axios
                .post("save-category-to-video", {
                    vid: video,
                    category: this.update.category
                })
                .then(response => {
                    this.$bvModal.hide(modal);
                });
        },
        deleteVideo(id, watch, index) {
            this.$axios.delete(`/delete-video/${id}`).then(response => {
                if (watch === "watch") {
                    this.nextVideo();
                } else {
                    this.vids.splice(index, 1);
                }
            });
        },
        AddVideoToPlayList(slug) {
            this.$axios
                .post("/add-to-playlists", {
                    playlist: slug,
                    video: this.$route.params.id
                })
                .then(response => {});
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
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle("shown");
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
    background: url("~assets/background.png");
    height: 100%;
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
    font-size: 1em;
    color: white;
    font-weight: bold;
    margin-top: 2em;
}

@media (min-width: 320px) {
    title {
        font-size: 0.5em;
    }
}

.leftBar {
    background-color: #090909;
    position: fixed;
    margin-right: 100px;
    color: #8422a6;
    border-top-right-radius: 50px;
    opacity: 0.8;
    width: 300px;
}

@media (min-device-width: 320px) and (max-device-width: 768px) {
    .video-desc {
        display: none;
    }

    h3 title {
        font-size: 1em !important;
    }

    title {
        font-size: 1em !important;
    }
}

.ytp-chrome-controls {
    color: grey;
    display: none;
}

.ytp-play-button.ytp-button {
    color: red;
}
.white {
    cursor: pointer;
    color: white !important;
}

.pink {
    cursor: pointer;
    color: #d303fc;
}
.cursor {
    cursor: pointer;
}

.next-list h1 {
    padding-top: 20px;
}

.cursor {
    cursor: pointer;
}
.selected-border {
    border: 5px solid purple !important;
}
.fa-2x {
    padding-right: 10px;
    margin-right: 10px;
}

.list-inline {
    margin-left: 100px;
    padding-left: 100px;
}
.list-inline li {
    padding-right: 20px;
}

.mobile-player {
    position: relative;
    display: block;
    width: 100%; /* width of iframe wrapper */
    height: auto;
    margin: auto;
    padding: 0% 0% 1.25%;
    overflow: hidden;
}
.mobile-player iframe {
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 246px;
}

.wrapper {
    position: relative;
    width: 100%;
 
}

iframe {
    position: absolute;
    width: 100%;
    height: 100% !important;
    background: #000;
}

.iframe-container {
    position: relative;
    width: 100%;

    height: 0;
}
.iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.body {
    margin-top:-36px;
}
</style>
