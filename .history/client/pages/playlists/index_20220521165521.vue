<template>
  <div class="body">
    <div class="main">
      <div class="heading">
        <button type="submit" @click="toggleSidebar">
          <i class="fas fa-bars"></i>
        </button>
        <span class="title">Chillwhispers</span>
      </div>
      <newLeftBar />
      <div class="content">
        <div>
          <search />
        </div>

        <div class="row">
          <filters-options />
          <!-- Container  -->
          <container-playlist />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import FiltersOptions from "./FiltersOptions.vue";
import ContainerPlaylist from "./ContainerPlaylist.vue";
export default {
  components: {
    newLeftBar,
    newFooter,
    search,
    FiltersOptions,
  },
  async asyncData({ $axios, params }) {
    let playlist = await $axios.$get(`/playlists`);
    let chann = await $axios.$get(`/channels`);

    return {
      visibleDivId: null,
      key: 26,
      isTop: true,
      isTock: true,
      isChill: true,
      isLong: true,
      isQuick: true,
      isMedidate: true,
      isDownTempo: true,
      isAmbiental: true,
      isGaming: true,
      isClassic: true,
      isLofi: true,
      isHipHop: true,
      isAfrican: true,
      isSpania: true,
      isChina: true,
      isArabil: true,
      isChinese: true,
      isFrance: true,
      isIndian: true,
      isItaly: true,
      isSpanish: true,
      isJapan: true,
      isTecno: true,
      isTrap: true,
      isPopular: true,
      playlists: playlist.playlists,
      tops: playlist.top,
      rock: playlist.rock,
      chill: playlist.chill,
      long: playlist.long,
      quick: playlist.quick,
      meditat: playlist.meditat,
      downtempo: playlist.downtempo,
      all: playlist.all,
      ambiental: playlist.ambiental,
      gaming: playlist.gaming,
      classic: playlist.classic,
      lo_fi: playlist.lo_fi,
      hiphop: playlist.hiphop,
      african: playlist.african,
      spania: playlist.spania,
      china: playlist.china,
      arabic: playlist.arabic,
      chinese: playlist.chinese,
      france: playlist.france,
      indian: playlist.indian,
      italy: playlist.italy,
      spanish: playlist.spanish,
      japan: playlist.japan,
      techno: playlist.techno,
      trap: playlist.trap,
      channels: chann.data,
    };
  },
  methods: {
    toggleSidebar() {
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("shown");
    },
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
  color: #f58aff;
}

label.btn span {
  font-size: 1.5em;
}

label input[type="radio"] ~ i.fa.fa-circle-o {
  color: #c8c8c8;
  display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o {
  display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o {
  display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o {
  color: #7aa3cc;
  display: inline;
}
label:hover input[type="radio"] ~ i.fa {
  color: #7aa3cc;
}

label input[type="checkbox"] ~ i.fa.fa-square-o {
  color: #c8c8c8;
  display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o {
  display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o {
  display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o {
  color: #7aa3cc;
  display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
  color: #7aa3cc;
}

div[data-toggle="buttons"] label.active {
  color: #7aa3cc;
}

div[data-toggle="buttons"] label {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 2em;
  text-align: left;
  white-space: nowrap;
  vertical-align: top;
  cursor: pointer;
  background-color: none;
  border: 0px solid #c8c8c8;
  border-radius: 3px;
  color: #c8c8c8;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

div[data-toggle="buttons"] label:hover {
  color: #7aa3cc;
}

div[data-toggle="buttons"] label:active,
div[data-toggle="buttons"] label.active {
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>
