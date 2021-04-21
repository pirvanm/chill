<template>
    <div class="c container-fluid">
        <!-- <Nav /> -->
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
        newFooter
    },

    head: {
        title: "Chillwhispers",
        meta: [
            {
                hid: "description",
                name: "description",
                content: "Chillwhispers Home Page"
            },
            {
                hid: "keywords",
                name: "keywords",
                content: "chillwhispers, video, calm music, music, music video,"
            },
            {
                hid: "og:title",
                name: "og:title",
                content: "Chillwhispers music videos"
            },
            {
                hid: "og:type",
                name: "og:type",
                content: "music"
            },
            {
                hid: "og:url",
                name: "og:url",
                content: "https://chillwhispers.com"
            },
            {
                hid: "og:image",
                name: "og:image",
                content: "https://i.ytimg.com/vi/n0svuurLibQ/mqdefault.jpg"
            },
            {
                hid: "og:site_name",
                name: "og:site_name",
                content: "chillwhispers"
            },
            {
                hid: "og:description",
                name: "og:description",
                content: "Chillwhispers Home Page"
            }
        ]
    },
    // mounted() {
    //     document.addEventListener("keydown", this.move);
    // },

    // beforeDestroy() {
    //     document.removeEventListener("keydown", this.move);
    // },

    methods: {
        move(e) {
            if (e.keyCode === 48) {
                window.location.href = "https://chillwhispers.com/playlists/1";
                //return;
            }

            if (e.keyCode === 49) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/3";
                //return;
            }

            if (e.keyCode === 50) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/4";
                //return;
            }

            if (e.keyCode === 51) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/6";
                //return;
            }

            if (e.keyCode === 52) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/7";
                //return;
            }

            if (e.keyCode === 53) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/8";
                //return;
            }

            if (e.keyCode === 54) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/9";
                //return;
            }

            if (e.keyCode === 55) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/10";
                //return;
            }

            if (e.keyCode === 56) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/13";
                //return;
            }

            if (e.keyCode === 57) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/14";
                //return;
            }

            if (e.keyCode === 17) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/19";
                //return;
            }

            if (e.keyCode === 84) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/20";
                //return;
            }

            e.preventDefault();
        }
    }
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
