<template>
  <div>
    <div class="bg-image"></div>

    <div class="homepage-video">
   
      <div class="row playlist-grid">
      <div class="col-md-2"><SideBar/>
      </div>
      <div class="col-md-9">
      <div class="row">
        <div class="col-md-3" v-for="playlist in playlists" :key="playlist.id">
          <div :class=playlist.cover_style class="card text-left">
            <nuxt-link :to="`/playlists/${playlist.slug}`">
              <!-- Basicaly i wanna load all playlist,done-->
              <!-- When you click on a playlist show song of that playlist an play-->
              {{playlist.name}}
              <!--    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                            <img class="card-img-top" :src="video.thumbnail" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ video.title }}</h4>
                                <p>{{ video.published_at }}</p>
              </div>-->
            </nuxt-link>
          </div> </div>
        </div></div>
      </div>
      <hr />
    </div>
  </div>
</template>


<script>
import SideBar from '@/components/SideS'
export default {
components: {      
        SideBar
    },
  async asyncData({ $axios, params }) {
    let vid = await $axios.$get(`/playlists`);
    let chann = await $axios.$get(`/channels`);
    return { playlists: vid.data, channels: chann.data };
  }
};
</script>