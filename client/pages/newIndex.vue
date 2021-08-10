<template>
    <div class="body">
    <div class="main">
        <div class="heading">
            <button type="submit" onclick=toggleSidebar()>
                <i class="fa fa-bars"></i></button>
            <span class="title">Chillwhispers</span>
        </div>
        <div class="sidebar">
            <nav>
                <a class="active" href="#">Home</a>
                <a href="#">Categories</a>
                <a href="#">History</a>
                <a href="#">Contact</a>
            </nav>
        </div>
        <div class="content">
            <form class="search-form">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="clearfix"></div>
            <h1>Popular songs</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        title: "Chillwhispers ",
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


/*# sourceMappingURL=style.css.map */
</style>
