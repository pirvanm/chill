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