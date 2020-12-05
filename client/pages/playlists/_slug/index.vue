<template>
  <div class="container-playlist c">
    <div v-if="videos.length">
      <div class="row">
        <div class="col-md-2 container-vertical-nav leftBar"><LeftBar /></div>
        <div class="col-md-6 container-video">
          <youtube
            ref="youtube"
            width="100%"
            height="450px"
            :video-id="videos[play].videoId"
            @ended="endVideo"
            :player-vars="playerVars"
          ></youtube>
        </div>
        <div class="col-md-4 container-list-video next-list">
          <h1>Coming</h1>
          <div class="main" v-for="(video, index) in videos" :key="index">
            <div class="play" v-if="index == play"></div>
            <div class="else-play" v-else>
              <a :href="`/playlists/${playlist}?videoid=${index}`">
                <img :src="video.thumbnail" alt />
                {{ video.title }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import SideBar from "@/components/SideS";
import LeftBar from "@/components/newLeftBar";
export default {
  components: {
    SideBar,
    LeftBar,
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
  data() {
    return {
      playlist: this.$route.params.slug,
      playerVars: {
        autoplay: 1,
      },
      play: 0,
    };
  },
  mounted() {
    this.getVideoIdParams();
  },
  methods: {
    getVideoIdParams() {
      console.log(this.$route.query.videoid);

      if (this.$route.query.videoid) {
        this.play = this.$route.query.videoid;
      } else {
        this.play = 0;
      }
    },
    endVideo() {
      var indexid = this.videos.findIndex((f) => f.id === this.videoLastId.id);

      console.log(indexid);
      if (indexid == this.play) {
        this.play = 0;
      } else {
        this.play++;
      }
    },
  },
};
</script>

<style scoped>
.container-vertical-nav {
  /* background-color: #f8f8f8; */
}

.container-video {
  margin-left: 15%;
  /* background-color: white !important; */
}
.container-playlist {
  margin-top: 100px;
}
.container-list-video {
  /* background-color: #f8f8f8; */
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
</style>