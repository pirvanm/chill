<template>
    <div class="container-fluid">
        <client-only>
            <notifications group="notification" />
        </client-only>
        <div class="homepage-video">
            <menu-bar />
        </div>
        <nuxt />
        <foo-bar />
    </div>
</template>

<script>
import MenuBar from "~/components/Menu";
import FooBar from "~/components/Footer";
export default {
    components: {
        "menu-bar": MenuBar,
        "foo-bar": FooBar
    }
};
</script>
<style>
/* .homepage-video {
   display:none;
 } */
</style>
