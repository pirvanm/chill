<template>
  <div>
    <nuxt-link
      v-for="locale in availableLocales"
      :key="locale.code"
      :to="switchLocalePath(locale.code)"
      class="ml-5 text-center"
      >{{ locale.name }}</nuxt-link
    >
    <nuxt />
  </div>
</template>

<script>
export default {
  head() {
    return this.$nuxtI18nHead();
  },
  mounted() {
    this.setHistory();
    this.pushLang();
  },
  computed: {
    availableLocales() {
      return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale);
    },
    lang() {
      return navigator.language;
    },
  },
  methods: {
    setHistory() {
      // if (this.$auth.$storage.getUniversal("videos")) {
      //     this.$auth.$storage.getUniversal("videos").forEach(vid => {
      //         this.$store.dispatch("history/addVideoToHistory", vid);
      //     });
      // }
    },
    pushLang() {
      window.$nuxt.$i18n.setLocaleCookie(this.lang);
      this.$router.push(this.switchLocalePath(this.lang));
    },
  },
};
</script>

<style></style>
