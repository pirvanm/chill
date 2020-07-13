<template>
  <div class="container-playlist">
    <div v-if="videos.length">
    <div class="row">
    <div class="col-md-2 container-vertical-nav">
    </div>
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
    <div class="col-md-4 container-list-video">
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
  </div>
</template>
<script>
export default {
  computed: {
    player() {
      return this.$refs.youtube.player;
    },
    videoLastId() {
      return this.videos[this.videos.length - 1];
    }
  },
  async asyncData({ $axios, params }) {
    let vid = await $axios.$get(`/playlists/${params.slug}`);
    return { videos: vid.data };
  },
  data() {
    return {
      playlist: this.$route.params.slug,
      playerVars: {
        autoplay: 1
      },
      play: 0
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
      var indexid = this.videos.findIndex(f => f.id === this.videoLastId.id);

      console.log(indexid);
      if (indexid == this.play) {
        this.play = 0;
      } else {
        this.play++;
      }
    }
  }
};
</script>

<style scoped>
.container-vertical-nav{
  background-color:pink;
}

.container-video{
  background-color:purple;
}
.container-playlist{
  margin-top:100px;
}
.container-list-video{
  background-color:blue;
}
.background {
  background-color: aqua;
}
.else-play{
      padding-bottom: 37px;
}
</style>
