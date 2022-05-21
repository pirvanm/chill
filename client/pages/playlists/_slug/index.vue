<template>
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
          <div v-if="videos.length">
            <div class="row">
              <div class="col-md-8">
                <h1 class="mb-2">{{ videos.title }}</h1>

                <div class="wrapper embed-responsive embed-responsive-4by3">
                  <youtube
                    ref="youtube"
                    width="560"
                    height="315"
                    :video-id="videos[play].videoId"
                    @ended="endVideo"
                    :player-vars="playerVars"
                    class="player embed-responsive-item"
                    picture-in-picture
                  >
                  </youtube>
                </div>
                <div class="mt-2">
                  <div class="audio-player text-center row">
                    <div class="controls-container col-xs-12 text-center">
                      <ul
                        class="controls text-center list-inline d-flex mx-auto pt-2 ml-5 pl-5"
                      >
                        <li>
                          <span
                            @click="videoPlay()"
                            :class="isPlay ? 'pink' : 'white'"
                          >
                            <i
                              class="fa fa-play fa-2x justify-content-center"
                            ></i>
                          </span>
                        </li>

                        <li>
                          <span
                            @click="pause"
                            :class="isPause ? 'pink' : 'white'"
                          >
                            <i
                              class="fa fa-pause fa-2x justify-content-center"
                            ></i>
                          </span>
                        </li>

                        <li>
                          <span @click="endVideo" style="cursor: pointer">
                            <i
                              class="fa fa-forward fa-2x justify-content-center"
                            ></i>
                          </span>
                        </li>
                        <li>
                          <span
                            @click="triggerLoop"
                            :class="loop ? 'yellow' : ''"
                          >
                            <i class="fas fa-redo-alt fa-2x"></i>
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <hr />
                </div>
              </div>
              <div class="col-md-4">
                <h2>Coming up</h2>
                <div
                  class="video-card mb-4 overflow-auto"
                  v-for="(video, index) in videos"
                  :key="index"
                >
                  <div
                    class="else-play cursor"
                    :class="
                      videos[play].videoId == video.videoId
                        ? 'selected-border'
                        : ''
                    "
                    @click.prevent="clickedPlaylist(index)"
                  >
                    <img :src="video.thumbnail" alt />

                    <p class="title">
                      {{ video.title }}
                    </p>
                    <a class="anchor" href="#anchor-link"></a>
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
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";

export default {
  components: {
    newLeftBar,
    search,
  },
  computed: {
    player() {
      return this.$refs.youtube.player;
    },
    videoLastId() {
      return this.videos[this.videos.length - 1];
    },
  },
  async asyncData({ $axios, params }) {
    let vid = await $axios.$get(`/playlists/${params.slug}`);
    return { videos: vid.data };
  },
  head() {
    return {
      title: this.videos[this.play].title,
      meta: [
        {
          hid: "description",
          name: "description",
          content: this.videos[this.play].description.substring(0, 300),
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
          content: this.videos[this.play].thumbnail,
        },
        {
          hid: "og:site_name",
          name: "og:site_name",
          content: "chillwhispers",
        },
        {
          hid: "og:description",
          name: "og:description",
          content: this.videos[this.play].description.substring(0, 300),
        },
        {
          hid: "twitter:card",
          name: "twitter:card",
          content: this.videos[this.play].title,
        },
        {
          hid: "twitter:url",
          name: "twitter:url",
          content: `https://chillwhispers.com/watch/${
            this.videos[this.play].videoId
          }`,
        },
        {
          hid: "twitter:creator",
          name: "twitter:creator",
          content: "@2amtech",
        },
        {
          hid: "twitter:title",
          name: "twitter:title",
          content: this.videos[this.play].title,
        },
        {
          hid: "twitter:description",
          name: "twitter:description",
          content: this.videos[this.play].description.substring(0, 300),
        },

        {
          hid: "twitter:image",
          name: "twitter:image",
          content: this.videos[this.play].thumbnail,
        },

        {
          hid: "twitter:app:url:iphone",
          name: "twitter:app:url:iphone",
          content: `https://www.youtube.com/embed/${
            this.videos[this.play].videoId
          }`,
        },
        {
          hid: "twitter:app:url:ipad",
          name: "twitter:app:url:ipad",
          content: `https://www.youtube.com/embed/${
            this.videos[this.play].videoId
          }`,
        },

        {
          hid: "twitter:app:url:googleplay",
          name: "twitter:app:url:googleplay",
          content: `https://www.youtube.com/embed/${
            this.videos[this.play].videoId
          }`,
        },
        {
          hid: "twitter:player",
          name: "twitter:player",
          content: `https://www.youtube.com/embed/${
            this.videos[this.play].videoId
          }`,
        },
      ],
    };
  },

  data() {
    return {
      isPlay: true,
      isPause: false,
      loop: false,
      playlist: this.$route.params.slug,
      playerVars: {
        autoplay: 1,
      },
      play: 0,
      videos: [],
    };
  },

  mounted() {
    document.addEventListener("keydown", this.move);
    this.getVideoIdParams();
    this.addVideoIdToUrl();
  },
  beforeDestroy() {
    document.removeEventListener("keydown", this.move);
  },
  methods: {
    videoPlay() {
      this.player.playVideo();
    },
    pause() {
      this.player.pauseVideo();
    },
    move(e) {
      if (e.keyCode === 76) {
      }

      if (e.keyCode === 78) {
        this.nextVideo();
      }

      //    if (e.keyCode === 82) {
      //     this.triggerLoop();
      //     //window.location.href = "https://chillwhispers.com/playlists/1";
      //     //return;
      // }

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
    nextVideo() {
      var indexid = this.videos.findIndex((f) => f.id === this.videoLastId.id);

      if (indexid == this.play) {
        this.play = 0;
      } else {
        this.play++;
      }
    },
    addVideoIdToUrl() {
      if (this.play) {
        this.$router.push(
          `/playlists/${this.$route.params.slug}?videoid=${
            this.videos[this.play].videoId
          }`
        );
      }
    },
    toggleSidebar() {
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("shown");
    },
    clickedPlaylist(index) {
      this.play = index;
      this.$router.push(
        `/playlists/${this.$route.params.slug}?videoid=${this.videos[index].videoId}`
      );
    },
    getVideoIdParams() {
      var index = this.videos.findIndex(
        (v) => v.videoId === this.$route.query.videoid
      );

      if (this.$route.query.videoid) {
        this.play = index;
      } else {
        this.play = 0;
      }
    },
    endVideo() {
      if (this.loop) {
        this.player.playVideo();
      } else {
        var indexid = this.videos.length - 1;
        // var indexid = this.videos.findIndex(
        //     f => f.id === this.videoLastId.id
        // );

        if (indexid == this.play) {
          this.play = 0;
        } else {
          this.play++;
        }
        this.$router.push(
          `/playlists/${this.$route.params.slug}?videoid=${
            this.videos[this.play].videoId
          }`
        );
      }
    },
  },
};
</script>

<style scoped>
.container-video {
  margin-left: 15%;
  /* background-color: white !important; */
}

.container-playlist {
  margin-top: 100px;
}

.background {
  background-color: aqua;
}

.else-play {
  padding-bottom: 37px;
}
</style>
<style>
.african,
.ambiental,
.ambiental-meditate,
.chillhop,
.chillout,
.chillout-gaming,
.classic,
.classical,
.chillstep,
.downtempo,
.lofi,
.lofi-hip,
.lofi-house,
.lounge,
.world,
.regional,
.regional-arab,
.regional-span,
.regional-italy,
.regional-chin,
.techno,
.trap,
.sleep,
.sad {
  padding: 50px;
  font-size: 25px;
  font-weight: bold;
  text-align: center;
  margin: auto;
  height: 190px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 15px;
}

.african {
  background-image: linear-gradient(to right, red, yellow, blue);
  color: black;
}

.ambiental {
  background-image: linear-gradient(to right, #4682b4, #708090);
  color: white;
}

.ambiental-meditate {
  background-color: black;
  color: white;
}

.chillhop {
  background-image: linear-gradient(to right, #8b008b, #8b0000);
  color: white;
}

.chillout {
  background-image: linear-gradient(to right, #ffff00, #87ceeb);
  color: white;
}

.chillout-gaming {
  background-color: black;
  color: white;
}

.chillstep {
  background-image: linear-gradient(to right, #ba55d3, #c8e5eb);
  color: white;
}

.world {
  background-color: black;
  color: white;
}

.classic {
  background-image: linear-gradient(to right, #dc143c, #f8f8ff);
  color: white;
}

.classical {
  background-image: linear-gradient(to right, #800000, #b8860b);
  color: white;
}

.downtempo {
  background-color: grey;
  color: white;
}

.lofi {
  background-color: #ff6600;
  color: lightyellow;
}

.lofi-hip {
  background-color: black;
  color: white;
}

.lofi-house {
  background-color: black;
  color: white;
}

.lounge {
  background-image: linear-gradient(to right, #00bfff, #1e90ff);
  color: white;
}

.regional {
  background-color: black;
  color: yellow;
}

.regional-arab {
  background-image: linear-gradient(to right, green, white, black);
  color: red;
}

.regional-italy {
  color: white;
  background-image: linear-gradient(to right, #009246, #ce2b37);
}

.regional-span {
  background-color: red;
  color: yellow;
}

.regional-chin {
  background-color: red;
  color: white;
}

.techno {
  background-image: linear-gradient(to right, black, #00ced1);
  color: white;
}

.trap {
  background-image: linear-gradient(to right, black, red);
}

.sleep {
  background-color: black;
  color: white;
}

.sad {
  background-color: black;
  color: white;
}

.c {
  padding-left: 3%;
  padding-top: 50px;
  background: url("~assets/background.png");
  height: 1560px;
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}

.leftBar {
  background-color: #090909;
  position: fixed;
  margin-right: 100px;
  /* margin-top: 120px; */
  width: 300px;
  height: 100%;
  color: #8422a6;
  border-top-right-radius: 50px;
  opacity: 0.8;
  height: 100%;
  /* width: 160px; */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  /* background-color: #111; */
  overflow-x: hidden;
  padding-top: 140px;
  padding-bottom: 20px;
}

a {
  color: #8422a6;
}

.next-list {
  background-color: #482139;
  border-top-left-radius: 50px;
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
.yellow {
  color: violet !important;
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

.embed-responsive-item {
  position: relative;
}

.wrapper {
  height: 350px;
  padding-bottom: 0;
}

.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.fa-2x {
  border: 5px solid white;
  padding: 10px;
  height: 55px;
  width: 55px !important;
  border-radius: 38px;
}
</style>
