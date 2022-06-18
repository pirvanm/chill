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
          <div class="d-flex mb-5" v-if="isAdmin">
            <button class="btn-info btn">
              <nuxt-link to="/admin" class="text-dark">Admin </nuxt-link>
            </button>
          </div>
          <search />
        </div>

        <div class="clearfix"></div>
        <h1>Popular songs</h1>
        <div class="container">
          <div class="row">
            <div
              class="col-lg-4 col-md-6 mb-4"
              v-for="(vid, index) in videos"
              :key="index"
            >
              <div class="video-card">
                <nuxt-link
                  :to="routeToLang(`/watch?v=${vid.videoId}`)"
                  class="text-dark"
                >
                  <img :src="vid.thumbnail" />
                  <p class="title">
                    {{ vid.title }}
                  </p>
                </nuxt-link>
                <a href="#" class="category">{{
                  vid.category.category_name
                }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <b-modal
      id="suggestion"
      size="xl"
      no-close-on-backdrop
      centered
      hide-footer
      title="Choose what u like!"
    >
      <suggestion-modal @saved="closeSuggestionModal" />
    </b-modal>
  </div>
</template>

<script>
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import SuggestionModal from "../components/suggestionModal.vue";

export default {
  name: "Home",
  components: {
    newLeftBar,
    newFooter,
    search,
    SuggestionModal,
  },

  async asyncData({ $axios, params }) {
    let data = await $axios.$get(`/list-home-videos`);

    return { videos: data.data };
  },
  data() {
    return {
      isAdmin: false,
    };
  },

  head: {
    title: "Chillwhispers ",
    meta: [
      {
        hid: "description",
        name: "description",
        content: "Chillwhispers Home Page",
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
        content: "https://i.ytimg.com/vi/n0svuurLibQ/mqdefault.jpg",
      },
      {
        hid: "og:site_name",
        name: "og:site_name",
        content: "chillwhispers",
      },
      {
        hid: "og:description",
        name: "og:description",
        content: "Chillwhispers Home Page",
      },
    ],
  },
  created() {
    if (this.$auth.loggedIn) {
      if (this.$auth.user.step == 1) {
        this.$bvModal.show("suggestion");
      }
    }
  },

  // beforeDestroy() {
  //   document.removeEventListener("keydown", this.move);
  // },

  methods: {
    routeToLang(loc) {
      if (this.$i18n.locale == "en") {
        return loc;
      } else {
        return "/" + this.$i18n.locale + loc;
      }
    },
    closeSuggestionModal() {
      this.$bvModal.hide("suggestion");
    },
    routeToLang(loc) {
      if (this.$i18n.locale == "en") {
        return loc;
      } else {
        return "/" + this.$i18n.locale + loc;
      }
    },
    toggleSidebar() {
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("shown");
    },
    // move(e) {
    //   if (e.keyCode === 48) {
    //     window.location.href = "https://chillwhispers.com/playlists/1";
    //     //return;
    //   }

    //   if (e.keyCode === 49) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/3";
    //     //return;
    //   }

    //   if (e.keyCode === 50) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/4";
    //     //return;
    //   }

    //   if (e.keyCode === 51) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/6";
    //     //return;
    //   }

    //   if (e.keyCode === 52) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/7";
    //     //return;
    //   }

    //   if (e.keyCode === 53) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/8";
    //     //return;
    //   }

    //   if (e.keyCode === 54) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/9";
    //     //return;
    //   }

    //   if (e.keyCode === 55) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/10";
    //     //return;
    //   }

    //   if (e.keyCode === 56) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/13";
    //     //return;
    //   }

    //   if (e.keyCode === 57) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/14";
    //     //return;
    //   }

    //   if (e.keyCode === 17) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/19";
    //     //return;
    //   }

    //   if (e.keyCode === 84) {
    //     console.log("stopp");
    //     window.location.href = "https://chillwhispers.com/playlists/20";
    //     //return;
    //   }

    //   e.preventDefault();
    // },
  },
};
</script>

<style scoped>
.fa-2x {
  border: 5px solid white;
  padding: 11px;
  height: 55px;
  width: 55px;
  border-radius: 38px;
}

/*# sourceMappingURL=style.css.map */
</style>
