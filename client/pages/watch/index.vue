<template>
    <div class="body">
        <div class="main">
            <div class="heading">
            <button type="submit" v-on:click=toggleSidebar()>
                <i class="fas fa-bars"></i>
            </button>
            <span class="title">Chillwhispers</span>
        </div>
        <newLeftBar />
        <div class="content">
            <div>
                <search />
            </div>

            <div class="clearfix"></div>

            <div class="container">
                <div v-if="vids.length">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="breadcrumbs">
                                <a href="/">Home</a>/ <nuxt-link :to="`/videos/${vid.category.category_name}`">
                                {{vid.category.category_name}}
                                </nuxt-link>
                            </div>
                            <br>
                            <div class="d-flex mb-5" v-if="isAdmin">
                            <b-modal :id="`modal-primary`" title="BootstrapVue" hide-footer>
 
                            <h1>
                                Update Category of this video
                            </h1>
                            <select v-model="update.category">
                                <option
                                    v-for="(cat, cindex) in categories" :key="`cat-${cindex}`":value="cat.id">{{ cat.category_name }}
                                    </option>
                            </select>

                            <button class="btn btn-sm btn-success" @click.prevent="saveCategory(vid.id, 'modal-primary') ">
                                Save
                            </button>
                            </b-modal>
                            <button class="btn btn-primary" @click.prevent="$bvModal.show(`modal-primary`)">Update
                            </button>

                            <button
                            type="button" class="btn btn-danger ml-2 btn-sm" data-dismiss="modal" @click.prevent="deleteVideo(vid.id, 'watch', 0)">
                            Remove
                            </button>
                    </div>
                             <br>
                           <h3 class="title">{{ vid.title }}</h3>
                            <br>
                    <youtube ref="youtube" width="100%" :video-id="vid.videoId" :player-vars="playerVars" @ended="endVideo" >
                    </youtube>
                  
                    <div class="video-desc" v-html="vid.description"></div>
                    </div>
                        <div class="col-md-4">
                            <h1>Coming up</h1>
                            <div class="video-card mb-4" v-for="(v, index) in vids" :key="`${index}v`" @click.prevent="gotoWatch(v.videoId)">
                                <div class="d-flex mb-5" v-if="isAdmin">
                        <b-modal :id="`modal-${index}v`" title="BootstrapVue" hide-footer >
                            <h1>
                                Update Category of this video
                            </h1>
                            <select v-model="update.category">
                                <option v-for="(cat, cindex) in categories" :key="`cat-${cindex}`" :value="cat.id" >{{ cat.category_name }}</option>
                                </select>

                            <button class="btn btn-sm btn-success"
                                @click.prevent=" saveCategory(v.id, `modal-${index}v`)"> Save
                            </button>
                        </b-modal>

                        <button class="btn btn-primary" @click.prevent="updateVideo(index)">
                            Update
                        </button>

                        <button type="button" class="btn btn-danger ml-2" data-dismiss="modal" @click.prevent="deleteVideo(v.id, 'category', index)">
                            Remove
                        </button>
                        <button type="button" class="btn btn-info ml-2"> {{v.category.category_name}}</button>
                    </div>      
                            <img :src="v.thumbnail"  />
                                <p class="title">  {{ v.title }}</p>
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
    async asyncData({ $axios, params, query }) {
        if (query) {
            let { video, videos, categories } = await $axios.$get(
                `/watch/${query.v}`
            );
            if (video) {
                return { vid: video, vids: videos, categories: categories };
            } else {
                this.$router.push("/");
            }
        }
    },
    data() {
        return {
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
        this.checkAdmin();
    },
    methods: {
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
            sidebar.classList.toggle('shown')
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

iframe {
    padding-left: 10px;
    padding-right: 10px;
    width: 100%;
  
      height: auto   !important;
}


@media (min-device-width: 320px ) and (max-device-width: 768px) {
    iframe {
        width: 100%;
        height: auto;
    }
    .video-desc {
        display:none;
    }

    h3 title {
        font-size: 1em!important;
    }

    title {
           font-size: 1em!important;
    }
}

youtube {
     width: 100%    !important;
  height: auto   !important;
}
</style>
