<template>
  <nuxt />
</template>

<script>
export default {
  mounted() {
    this.setHistory();
  },
  methods: {
    setHistory() {
      // if (this.$auth.$storage.getUniversal("videos")) {
      //     this.$auth.$storage.getUniversal("videos").forEach(vid => {
      //         this.$store.dispatch("history/addVideoToHistory", vid);
      //     });
      // }
    },
  },
};
</script>

<style></style>
