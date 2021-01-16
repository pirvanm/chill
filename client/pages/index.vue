<template>
  <div class="c container-fluid">
    <Nav />

    <newContainerHome />
    <newFooter />
  </div>
</template>
<script>
import Nav from "@/components/Nav";
import newLeftBar from "@/components/newLeftBar";
import newContainerHome from "@/components/newContainerHome";
import newFooter from "@/components/newFooter";
export default {
  components: {
    Nav,
    newLeftBar,
    newContainerHome,
    newFooter,
  },


  mounted() {
    document.addEventListener("keydown", this.move);
  },


beforeDestroy() {
    document.removeEventListener("keydown", this.move);
  },


   methods: {
    move(e) {
      if (!(e.keyCode === 48 && e.ctrlKey)) {
        
         window.location.href = 'https://chillwhispers.com/playlists/1'
        //return;
      }

      if (!(e.keyCode === 49 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/3'
        //return;
      }

      if (!(e.keyCode === 50 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/4'
        //return;
      }

      if (!(e.keyCode === 51 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/6'
        //return;
      }

      if (!(e.keyCode === 52 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/7'
        //return;
      }

      if (!(e.keyCode === 53 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/8'
        //return;
      }

      if (!(e.keyCode === 54 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/9'
        //return;
      }

      if (!(e.keyCode === 55 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/10'
        //return;
      }

      if (!(e.keyCode === 56 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/13'
        //return;
      }

      if (!(e.keyCode === 57 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/14'
        //return;
      }

       if (!(e.keyCode === 17 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/19'
        //return;
      }

        if (!(e.keyCode === 84 && e.ctrlKey)) {
        console.log('stopp');
         window.location.href = 'https://chillwhispers.com/playlists/20'
        //return;
      }

      e.preventDefault();
     
     
    },

 
  }




};
</script>

<style scoped>
.c {
  padding-left: 3%;
  /* padding-top:50px; */
  background: url("~assets/background.png");
  height: 1560px;
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
</style>