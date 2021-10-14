<template>
    <div class="body">
        <div class="main">
            <div class="heading">
                <button type="submit" @click="toggleSidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="title">Chillwhispers</span>
            </div>
            <newLeftBar />
            <div class="content">
                <div>
                    <search />
                </div>

                <div class="container">
                    <h1>Top Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in tops"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container">
                    <h1>Rock Playlist</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in rock"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container">
                    <h1>Chill Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in chill"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container">
                    <h1>Long Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in long"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container">
                    <h1>Quick Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in quick"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Meditate Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in meditat"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Down Tempo Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in downtempo"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>All Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in all"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Ambiental Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in ambiental"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Gaming Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in gaming"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Classic Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in classic"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Lo-Fi Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in lo_fi"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>HipHop Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in hiphop"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>African Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in african"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Spania Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in spania"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>China Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in china"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Arabic Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in arabic"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Chinese Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in chinese"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>France Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in france"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Indian Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in indian"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>italy Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in italy"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>spanish Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in spanish"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>japan Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in japan"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>techno Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in techno"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container">
                    <h1>Trap Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in trap"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container">
                    <h1>Popular Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in playlists"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
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
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
export default {
    components: {
        newLeftBar,
        newFooter,
        search
    },
    async asyncData({ $axios, params }) {
        let playlist = await $axios.$get(`/playlists`);
        let chann = await $axios.$get(`/channels`);
        return {
            playlists: playlist.playlists,
            tops: playlist.top,
            rock: playlist.rock,
            chill: playlist.chill,
            long: playlist.long,
            quick: playlist.quick,
            meditat: playlist.meditat,
            downtempo: playlist.downtempo,
            all: playlist.all,
            ambiental: playlist.ambiental,
            gaming: playlist.gaming,
            classic: playlist.classic,
            lo_fi: playlist.lo_fi,
            hiphop: playlist.hiphop,
            african: playlist.african,
            spania: playlist.spania,
            china: playlist.china,
            arabic: playlist.arabic,
            chinese: playlist.chinese,
            france: playlist.france,
            indian: playlist.indian,
            italy: playlist.italy,
            spanish: playlist.spanish,
            japan: playlist.japan,
            techno: playlist.techno,
            trap: playlist.trap,
            channels: chann.data
        };
    },

    methods: {
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle("shown");
        }
    }
};
</script>

<style scoped>
.c {
    padding-left: 3%;
    padding-top: 50px;
    background: url("~assets/background.png");
    height: 5000px;
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}

.leftBar {
    background-color: #090909;
    position: fixed;
    margin-right: 100px;
    /* margin-top: 120px; */
    height: 100%;
    color: #8422a6;
    border-top-right-radius: 50px;
    opacity: 0.8;
    height: 100%;
    /* width: 160px; */
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    /* background-color: #111; */
    overflow-x: hidden;
    padding-top: 140px;
    padding-bottom: 20px;
    width: 300px;
}
a {
    color: #f58aff;
}
</style>
