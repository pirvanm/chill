<template>
  <div>
    <div class="row">
      <div class="col-md-2 leftBar d-lg-block d-none d-md-block d-lg-none">
        <newLeftBar />
      </div>

      <div class="offset-md-2 col-md-4 play">
        <p>Ceva</p>
        Ceva 1

        <youtube
          ref="youtube"
          width="100%"
          height="450px"
          :video-id="vid.videoId"
          :player-vars="playerVars"
          @playing="playing"
          @ended="endVideo"
        >
        </youtube>
      </div>
      <div class="offset-md-2 col-md-4 list">
        <p>Ceva 1</p>
      </div>
    </div>
  </div>
</template>
<script>
import newLeftBar from "@/components/newLeftBar";

export default {
  components: {
    newLeftBar,
  },

  async asyncData({ $axios, params }) {
    let { video, videos } = await $axios.$get(`/watch/${params.id}`);
    return { vid: video, vids: videos.data };
  },

  // Definition of Someting
  data() {
    return {
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
      this.$axios.get("/playlists").then((response) => {
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
          name: this.form.name,
        })
        .then((response) => {
          this.busy = false;
          this.getPlaylist();
          console.log(response);
        });
    },
    AddVideoToPlayList(slug) {
      this.$axios
        .post("/add-to-playlists", {
          playlist: slug,
          video: this.$route.params.id,
        })
        .then((response) => {
          console.log(response);
        });
    },
  },
};
</script>

<style scoped>
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

.leftBar {
  background-color: #090909;
  position: fixed;
  margin-right: 100px;
  /* margin-top: 120px; */
  height: 100%;
  color: #8422a6;
  border-top-right-radius: 50px;
  opacity: 0.8;
}
p {
  color: red;
}
</style>