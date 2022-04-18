<template>
  <div>
    <div class="sidebar">
      <nav>
        <nuxt-link :to="routeToLang('/')">{{ $t("home") }}</nuxt-link>
        <nuxt-link :to="routeToLang('/videos')">{{ $t("videos") }}</nuxt-link>
        <nuxt-link :to="routeToLang('/playlists')">{{
          $t("playlists")
        }}</nuxt-link>
        <nuxt-link :to="routeToLang('/history')">{{ $t("history") }}</nuxt-link>
        <nuxt-link :to="routeToLang('/contact')">{{ $t("contact") }}</nuxt-link>
      </nav>
    </div>
  </div>
</template>
<script>
export default {
  methods: {
    routeToLang(loc) {
      if (this.$i18n.locale == "en") {
        return loc;
      } else {
        return "/" + this.$i18n.locale + loc;
      }
    },
  },
};
</script>
<style scoped>
ul {
  /* background-color: red; */
}

h2 {
  font-size: 1.5em;
  padding: 10px 0 10px 0;
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;

  color: white;
  text-align: center;
}

.footer ul li {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}
li a {
  color: #8422a6;
}
</style>
