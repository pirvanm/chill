<template>
  <div>
    <div class="homepage-video">
      <div class="row playlist-grid c">
        <div class="col-md-2 leftBar d-lg-block d-none d-md-block d-lg-none">
          <LeftBar />
        </div>
        <div class="offset-md-2 col-md-9">
          <div class="row">
            <div
              class="col-md-3"
              v-for="playlist in playlists"
              :key="playlist.id"
            >
              <div :class="playlist.cover_style" class="card text-left">
                <nuxt-link :to="`/playlists/${playlist.slug}`">
                  <!-- Basicaly i wanna load all playlist,done-->
                  <!-- When you click on a playlist show song of that playlist an play-->
                  {{ playlist.name }}
                  <!--    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                            <img class="card-img-top" :src="video.thumbnail" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ video.title }}</h4>
                                <p>{{ video.published_at }}</p>
              </div>-->
                </nuxt-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
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
  async asyncData({ $axios, params }) {
    let vid = await $axios.$get(`/playlists`);
    let chann = await $axios.$get(`/channels`);
    return { playlists: vid.data, channels: chann.data };
  },
};
</script>

<style scoped>
.c {
  padding-left: 3%;
  padding-top: 50px;
  background: url("~assets/background.png");
  height: 5000px;
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
    width: 300px;
}
a {
  color: #8422a6;
}
</style>
