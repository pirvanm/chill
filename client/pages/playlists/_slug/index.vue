<template>
  <div class="container-playlist">
    <div v-if="videos.length">
    <div class="row">
    <div class="col-md-2 container-vertical-nav"><SideBar/>
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
<script>import SideBar from '@/components/SideS'
export default {
components: {      
        SideBar
    },
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
  background-color:#F8F8F8;
}

.container-video{  
   margin-left: 0%;
  background-color:white!important;
}
.container-playlist{
  margin-top:100px;
}
.container-list-video{
  background-color:#F8F8F8;;
}
.background {
  background-color: aqua;
}
.else-play{
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
.sad
{
padding: 50px;
font-size: 25px;
font-weight: bold;
text-align: center;
margin: auto;
height: 190px;
display: flex;
justify-content: center;
align-items: center;
margin-bottom:15px
}
.african {
background-image: linear-gradient(to right, red,yellow ,blue );
color: black;
}

.ambiental{
background-image: linear-gradient(to right, #4682B4,#708090 );
color: white;
}

.ambiental-meditate{
background-color: black;
color: white;
}
.chillhop
{
background-image: linear-gradient(to right, #8B008B,#8B0000);
color: white; 
}

.chillout
{
background-image: linear-gradient(to right, #FFFF00,#87CEEB);
color: white;  
}
.chillout-gaming
{
  background-color: black;
color: white; 
}
.chillstep {
      background-image: linear-gradient(to right, #BA55D3 ,#c8e5eb );
color: white; 
}
.world
{
  background-color: black;
color: white;
}
.classic{
   background-image: linear-gradient(to right, #DC143C ,#F8F8FF );
color: white;
}
.classical{
     background-image: linear-gradient(to right, #800000 ,#B8860B );
color: white;
}
.downtempo{
  background-color: grey;
color: white;
}
.lofi {
 background-color:#FF6600 ;
color: lightyellow;
}
.lofi-hip{
      background-color: black;
color: white;
}
.lofi-house{
        background-color: black;
color: white;
}
.lounge{
         background-image: linear-gradient(to right, #00BFFF ,#1E90FF );
color: white; 
}
.regional {
   background-color: black;
color: yellow; 
}
.regional-arab{
      background-image: linear-gradient(to right, green ,white,black );
color: red; 
}
.regional-italy{
color: white; 
background-image: linear-gradient(to right, #009246 ,#ce2b37 );
}

.regional-span{
background-color: red;
color: yellow;
}
.regional-chin{
background-color: red;
color: white;
}

.techno
{
background-image: linear-gradient(to right, black ,#00CED1 );
color: white;
}
.trap{
background-image: linear-gradient(to right, black ,red );
}
.sleep{
    background-color: black;
color: white;
}
.sad{
    background-color: black;
color: white;
}
</style>