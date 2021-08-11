<template>
    <div class="body">
    <div class="main">
        <div class="heading">


<!--            <button type="submit" v-on:click=toggleSidebar()>-->
<!--                <i class="fa fa-bars"></i>Menu</button>-->

            <button type="submit" v-on:click=toggleSidebar()>
                <i class="fas fa-bars">Menu</i></button>
            <span class="title">Chillwhispers</span>
        </div>

        <newLeftBar />
        <div class="content">
            <div>
                <search />
            </div>

            <div class="clearfix"></div>
            <h1>Popular songs</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/_bpS-cOBK6Q"
                                class="text-dark"
                            >
                            <img src="https://i.ytimg.com/vi/eulJvgsAZao/mqdefault.jpg"/>
                            <p class="title">
                                Booker T & the M G 's - Green Onions (Original / HQ audio)
                            </p>

                            </nuxt-link>
                            <a href="#" class="category">Rock</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/PQQHuUGiOG8"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                                <p class="title">
                                    Best of Trip Hop & Downtempo & Lofi & Hip Hop Instrumental Vol  3 Re Upload
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Downtempo</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/neV3EPgvZ3g"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/neV3EPgvZ3g/mqdefault.jpg"/>
                                <p class="title">
                                    Relaxing Jazz Music - Background Chill Out  Music - Music For Relax,Study,Work
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">ChillHop</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/zOvsyamoEDg"
                                class="text-dark">
                                <img src="https://i.ytimg.com/vi/zOvsyamoEDg/mqdefault.jpg"/>
                                <p class="title">
                                    FAUN - Federkleid (Offizielles Video)
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Regional</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/yEbrvMljMCg"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/yEbrvMljMCg/mqdefault.jpg"/>
                                <p class="title">
                                    Deborah de Luca @ Château de Chambord in France for Cercle
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Tehno</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/2atQnvunGCo"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/2atQnvunGCo/mqdefault_live.jpg"/>
                                <p class="title">
                                    Shiloh - lofi hip hop mix [LIVE 24/7] Shiloh Dynasty
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Lo-Fi</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/98I_ST9GZSE"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/98I_ST9GZSE/mqdefault.jpg"/>
                                <p class="title">
                                    Beautiful IBIZA Beach Lounge Del Mar
                                    Chillout Mix
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Lounge</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/fWRISvgAygU"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/fWRISvgAygU/mqdefault.jpg"/>
                                <p class="title">
                                    Epic Chillstep Collection 2015 [2 Hours]
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Chillstep</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/jUoGYrWZXLs"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/jUoGYrWZXLs/mqdefault.jpg"/>
                                <p class="title">
                                    Doja Cat - Trauma
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Clasic Pop</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/7JmprpRIsEY"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/7JmprpRIsEY/mqdefault.jpg"/>
                                <p class="title">
                                    Classical Music for Brain Power -
                                    Mozartx
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Classical</a>
                        </div>
                    </div>

<!--                    <div class="col-lg-4 col-md-6 mb-4">-->
<!--                        <div class="video-card">-->
<!--                            <nuxt-link-->
<!--                                to="/watch/jpv2tMJJuz0"-->
<!--                                class="text-dark"-->
<!--                            >-->
<!--                                <img src="https://i.ytimg.com/vi/jpv2tMJJuz0/mqdefault.jpg"/>-->
<!--                                <p class="title">-->
<!--                                    EHRLING - Nu Lounge Bar Music 2017-->
<!--                                </p>-->
<!--                            </nuxt-link>-->
<!--                            <a href="#" class="category">Classical</a>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/hvkZWhpzmWs"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/hvkZWhpzmWs/mqdefault.jpg"/>
                                <p class="title">
                                    Italian Dinner - Background Music,
                                    Italian Music, Folk Music from Italy
                                    (Carosone, Modugno...)
                                </p>
                            </nuxt-link>
                            <a href="#" class="category">Regioanal </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/K9WiYD8zCA8"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/K9WiYD8zCA8/mqdefault.jpg"/>
                                <p class="title">
                                    Trap Music ♫ Chill & Happy Trap Mix
                                    ♫ Gaming Music
                                </p>
                            </nuxt-link>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <nuxt-link
                                to="/watch/hDzgYiiuR30"
                                class="text-dark"
                            >
                                <img src="https://i.ytimg.com/vi/hDzgYiiuR30/mqdefault.jpg"/>
                                <p class="title">
                                    Wonderfull Chill Out Music Love
                                    Session on Amazing
                                </p>
                            </nuxt-link>
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
import newContainerHome from "@/components/newContainerHome";
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
export default {
    components: {
        Nav,
        newLeftBar,
        newContainerHome,
        newFooter,
        search
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
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
        },
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
