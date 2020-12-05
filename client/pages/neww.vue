<template>
  <div class="c container-fluid">
    <Nav />

    <newContainerWatch />
    <newFooter />
  </div>
</template>
<script>
import Nav from "@/components/Nav";
import newLeftBar from "@/components/newLeftBar";
import newContainerWatch from "@/components/newContainerWatch";
import newFooter from "@/components/newFooter";
export default {
  components: {
    Nav,
    newLeftBar,
    newContainerWatch,
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