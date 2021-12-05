<template>
<<<<<<< HEAD
    <div>
        <desktop
            v-if="innerWidth > 786"
            :vid="vid"
            :vids="vids"
            :categories="categories"
        >
        </desktop>
        <mobile v-else :vid="vid" :vids="vids" :categories="categories">
        </mobile>
=======
  <div class="body">
    <div class="main">
      <div class="heading">
        <button type="submit" v-on:click="toggleSidebar()">
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
                  <a href="/">Home</a>/
                  <nuxt-link :to="`/videos/${vid.category.category_name}`">
                    {{ vid.category.category_name }}
                  </nuxt-link>
                </div>
                <br />
                <div class="d-flex mb-5" v-if="isAdmin">
                  <b-modal
                    :id="`modal-primary`"
                    title="BootstrapVue"
                    hide-footer
                  >
                    <h1>Update Category of this video</h1>
                    <select v-model="update.category">
                      <option
                        v-for="(cat, cindex) in categories"
                        :key="`cat-${cindex}`"
                        :value="cat.id"
                      >
                        {{ cat.category_name }}
                      </option>
                    </select>

                    <button
                      class="btn btn-sm btn-success"
                      @click.prevent="saveCategory(vid.id, 'modal-primary')"
                    >
                      Save
                    </button>
                  </b-modal>
                  <button
                    class="btn btn-primary"
                    @click.prevent="$bvModal.show(`modal-primary`)"
                  >
                    Update
                  </button>

                  <button
                    type="button"
                    class="btn btn-danger ml-2 btn-sm"
                    data-dismiss="modal"
                    @click.prevent="deleteVideo(vid.id, 'watch', 0)"
                  >
                    Remove
                  </button>
                </div>
                <br />
                <h3 class="title sm-mt-0">{{ vid.title }}</h3>
                <br />

                <div class="wrapper embed-responsive embed-responsive-4by3">
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

                <div class="mt-2">
                  <span @click="play" :class="isPlay ? 'pink' : 'white'">
                    <i class="fas fa-play fa-2x"></i>
                  </span>

                  <span @click="pause" :class="isPause ? 'pink' : 'white'">
                    <i class="fas fa-pause fa-2x"></i>
                  </span>

                  <span @click="nextVideo" class="cursor">
                    <i class="fas fa-forward fa-2x"></i>
                  </span>

                  <span @click="triggerLoop" :class="loop ? 'pink' : 'white'">
                    <i class="fas fa-redo-alt fa-2x"></i>
                  </span>
                </div>

                <div></div>

                <div class="video-desc" v-html="vid.description"></div>
              </div>
              <div class="col-md-4">
                <h1>Coming up</h1>
                <div
                  class="video-card mb-4"
                  v-for="(v, index) in vids"
                  :key="`${index}v`"
                  @click.prevent="gotoWatch(v.videoId)"
                >
                  <div class="d-flex mb-5" v-if="isAdmin">
                    <b-modal
                      :id="`modal-${index}v`"
                      title="BootstrapVue"
                      hide-footer
                    >
                      <h1>Update Category of this video</h1>
                      <select v-model="update.category">
                        <option
                          v-for="(cat, cindex) in categories"
                          :key="`cat-${cindex}`"
                          :value="cat.id"
                        >
                          {{ cat.category_name }}
                        </option>
                      </select>

                      <button
                        class="btn btn-sm btn-success"
                        @click.prevent="saveCategory(v.id, `modal-${index}v`)"
                      >
                        Save
                      </button>
                    </b-modal>

                    <button
                      class="btn btn-primary"
                      @click.prevent="updateVideo(index)"
                    >
                      Update
                    </button>

                    <button
                      type="button"
                      class="btn btn-danger ml-2"
                      data-dismiss="modal"
                      @click.prevent="deleteVideo(v.id, 'category', index)"
                    >
                      Remove
                    </button>
                    <button type="button" class="btn btn-info ml-2">
                      {{ v.category.category_name }}
                    </button>
                  </div>
                  <img :src="v.thumbnail" />
                  <p class="title">{{ v.title }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
>>>>>>> ba81431b8f3c819ca8fbb23c94393152576cd816
    </div>
</template>

<script>
import SideBar from "@/components/SideBar";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import desktop from "@/components/watch/desktop";
import mobile from "@/components/watch/mobile";
export default {
<<<<<<< HEAD
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
=======
  components: {
    SideBar,
    newLeftBar,
    search,
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
      loop: false,
      isPlay: true,
      isPause: false,
      showModal: false,
      isAdmin: false,
      nextSongText: "Next Song Are comming",
      busy: false,
      playlists: [],
      form: {
        name: "",
      },
      playerVars: {
        autoplay: 1,
        modestbranding: 1,
        showinfo: 0,
      },
      url: "",
      vid: {},
      tagvids: [],
      update: {
        category: 1,
      },
    };
  },
  head() {
    return {
      title: this.vid.title,
      meta: [
        {
          hid: "description",
          name: "description",
          content: this.vid.description.substring(0, 300),
        },
        {
          hid: "keywords",
          name: "keywords",
          content: "chillwhispers, video, calm music, music, music video,",
        },
        {
          hid: "og:title",
          name: "og:title",
          content: "Chillwhispers music videos",
        },
        {
          hid: "og:type",
          name: "og:type",
          content: "music",
        },
        {
          hid: "og:url",
          name: "og:url",
          content: "https://chillwhispers.com",
        },
        {
          hid: "og:image",
          name: "og:image",
          content: this.vid.thumbnail,
        },
        {
          hid: "og:site_name",
          name: "og:site_name",
          content: "chillwhispers",
        },
        {
          hid: "og:description",
          name: "og:description",
          content: this.vid.description.substring(0, 300),
        },
        {
          hid: "twitter:card",
          name: "twitter:card",
          content: this.vid.title,
        },
        {
          hid: "twitter:url",
          name: "twitter:url",
          content: `https://chillwhispers.com/watch/${this.vid.videoId}`,
        },
        {
          hid: "twitter:creator",
          name: "twitter:creator",
          content: "@2amtech",
        },
        {
          hid: "twitter:title",
          name: "twitter:title",
          content: this.vid.title,
        },
        {
          hid: "twitter:description",
          name: "twitter:description",
          content: this.vid.description.substring(0, 300),
        },

        {
          hid: "twitter:image",
          name: "twitter:image",
          content: this.vid.thumbnail,
        },

        {
          hid: "twitter:app:url:iphone",
          name: "twitter:app:url:iphone",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
        {
          hid: "twitter:app:url:ipad",
          name: "twitter:app:url:ipad",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },

        {
          hid: "twitter:app:url:googleplay",
          name: "twitter:app:url:googleplay",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
        {
          hid: "twitter:player",
          name: "twitter:player",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
      ],
    };
  },

  computed: {
    player() {
      return this.$refs.youtube.player;
    },
    query() {
      return this.$route.query.v;
    },
  },
  watch: {
    query: {
      // This will let Vue know to look inside the array
      deep: true,

      // We have to move our method to a handler field
      handler() {
        this.gotoWatch(this.$route.query.v);
      },
    },
  },
  mounted() {
    document.addEventListener("keydown", this.move);
    this.getPlaylist();
    this.url = window.location.href;
    this.addToHistory();
    this.checkAdmin();
  },
  beforeDestroy() {
    document.removeEventListener("keydown", this.move);
  },
  methods: {
    move(e) {
      if (e.keyCode === 76) {
        this.play();
      }

      if (e.keyCode === 78) {
        this.nextVideo();
      }

      if (e.keyCode === 65) {
        // pause
        this.pause();
        //window.location.href = "https://chillwhispers.com/playlists/1";
        //return;
      }

      if (e.keyCode === 82) {
        this.triggerLoop();
      }

      e.preventDefault();
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
>>>>>>> ba81431b8f3c819ca8fbb23c94393152576cd816
    },
    components: {
        SideBar,
        newLeftBar,
        search,
        desktop,
        mobile
    },

    data() {
        return {
            innerWidth: 0
        };
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
        }
    }
};
</script>
<<<<<<< HEAD
=======
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

  height: 650px;
  padding-bottom: 0;
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
  padding-bottom: 56.25%;
  height: 0;
}
.iframe-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
>>>>>>> ba81431b8f3c819ca8fbb23c94393152576cd816
