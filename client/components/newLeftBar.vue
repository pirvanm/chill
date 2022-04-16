<template>
  <div>
    <div class="sidebar">
      <nav>
        <nuxt-link :to="`/${$i18n.locale}/`">{{ $t("home") }}</nuxt-link>
        <nuxt-link :to="`/${$i18n.locale}/videos`">{{
          $t("videos")
        }}</nuxt-link>
        <nuxt-link :to="`/${$i18n.locale}/playlists`">{{
          $t("playlists")
        }}</nuxt-link>
        <nuxt-link :to="`/${$i18n.locale}/history`">{{
          $t("history")
        }}</nuxt-link>
        <nuxt-link :to="`/${$i18n.locale}/contact`">{{
          $t("contact")
        }}</nuxt-link>
      </nav>
    </div>

    <!--        <div class="footer">-->
    <!--            <ul>-->
    <!--                <li></li>-->
    <!--            </ul>-->
    <!--        </div>-->
  </div>
</template>
<script>
export default {};
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
