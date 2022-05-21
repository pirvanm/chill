<template>
  <div>
    <desktop
      v-if="innerWidth > 786"
      :vid="vid"
      :vids="vids"
      :categories="categories"
      @respo="responseData($event)"
      ref="youtube"
      @endVideo="endVideo"
    >
    </desktop>
    <mobile
      v-else
      :vid="vid"
      :vids="vids"
      :categories="categories"
      @endVideo="endVideo"
    >
    </mobile>
  </div>
</template>

<script>
import SideBar from "@/components/SideBar";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import desktop from "@/components/watch/desktop";
import mobile from "@/components/watch/mobile";
export default {
  name: "Watch",
  head() {
    return {
      title: this.vid.title,
      meta: [
        {
          hid: "description",
          name: "description",
          content: this.vid.description.substring(0, 300),
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
          content: this.vid.thumbnail,
        },
        {
          hid: "og:site_name",
          name: "og:site_name",
          content: "chillwhispers",
        },
        {
          hid: "og:description",
          name: "og:description",
          content: this.vid.description.substring(0, 300),
        },
        {
          hid: "twitter:card",
          name: "twitter:card",
          content: this.vid.title,
        },
        {
          hid: "twitter:url",
          name: "twitter:url",
          content: `https://chillwhispers.com/watch/${this.vid.videoId}`,
        },
        {
          hid: "twitter:creator",
          name: "twitter:creator",
          content: "@2amtech",
        },
        {
          hid: "twitter:title",
          name: "twitter:title",
          content: this.vid.title,
        },
        {
          hid: "twitter:description",
          name: "twitter:description",
          content: this.vid.description.substring(0, 300),
        },

        {
          hid: "twitter:image",
          name: "twitter:image",
          content: this.vid.thumbnail,
        },

        {
          hid: "twitter:app:url:iphone",
          name: "twitter:app:url:iphone",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
        {
          hid: "twitter:app:url:ipad",
          name: "twitter:app:url:ipad",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },

        {
          hid: "twitter:app:url:googleplay",
          name: "twitter:app:url:googleplay",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
        {
          hid: "twitter:player",
          name: "twitter:player",
          content: `https://www.youtube.com/embed/${this.vid.videoId}`,
        },
      ],
    };
  },
  async asyncData({ $axios, params, query }) {
    if (query) {
      let { video, videos, categories } = await $axios.$get(
        `/watch/${query.v}`
      );
      if (video) {
        return { vid: video, vids: videos, categories: categories };
      } else {
        this.$router.push("/");
      }
    }
  },
  computed: {
    player() {
      return this.$refs.youtube.$refs.youtube.player;
    },
    query() {
      return this.$route.query.v;
    },
  },
  watch: {
    query: {
      deep: true,

      handler() {
        this.gotoWatch(this.$route.query.v);
      },
    },
  },
  components: {
    SideBar,
    newLeftBar,
    search,
    desktop,
    mobile,
  },

  data() {
    return {
      innerWidth: 0,
    };
  },

  created() {
    if (process.browser) {
      window.addEventListener("resize", this.handleResize);
      this.handleResize();
    }
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  methods: {
    gotoWatch(v) {
      window.scrollTo(0, 0);
      this.$router.push(this.routeToLang(`/watch?v=${v}`));
      this.$axios.get(`/watch/${v}`).then((response) => {
        this.$emit("respo", response);
      });
      this.addToHistory();
    },
    addToHistory() {
      var data = this.vid;
      this.$store.dispatch("history/addVideoToHistory", data);
    },
    routeToLang(loc) {
      if (this.$i18n.locale == "en") {
        return loc;
      } else {
        return "/" + this.$i18n.locale + loc;
      }
    },
    endVideo() {
      if (this.loop) {
        this.player.playVideo();
      } else {
        this.vid = this.vids[0];

        this.$router.push(this.routeToLang(`/watch?v=${this.vid.videoId}`));
        this.player.playVideo();

        this.vids.splice(0, 1);
      }
    },
    handleResize() {
      this.innerWidth = window.innerWidth;
    },
    responseData(data) {
      this.vid = data.data.video;
      this.vids = data.data.videos;
    },
  },
};
</script>
