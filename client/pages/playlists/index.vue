<template>
    <div class="body">
        <div class="main">
            <div class="heading">


                <!--            <button type="submit" v-on:click=toggleSidebar()>-->
                <!--                <i class="fa fa-bars"></i>Menu</button>-->

                <button type="submit" v-on:click=toggleSidebar()>
                    <i class="fas fa-bars"></i></button>
                <span class="title">Chillwhispers</span>
            </div>
            <newLeftBar />
            <div class="content">
                <div>
                    <search />
                </div>
                <div class="clearfix"></div>

                <div class="container">
                    <h1>Popular  Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4"  v-for="popularCategory in popularPlaylistsByCategory"
                             :key="popularCategory.id" >
                            <div class="category-card">
                         
                        <img :src= popularCategory.image />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`">
                                    <div>
                                        <a href="#category-link" class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                        
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>


                    <h1>Popular Playlist For Each Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4"  v-for="playlist in playlists"
                             :key="playlist.id" >
                            <div class="category-card">
                         
                        <img :src= playlist.image />
                                <nuxt-link :to="`/playlists/${playlist.slug}`">
                                    <div>
                                        <a href="#category-link" class="category">
                                            {{ playlist.name }}
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
        let vid = await $axios.$get(`/playlists`);
        let chann = await $axios.$get(`/channels`);
        return { playlists: vid.data,popularPlaylistsByCategory:vid.data, channels: chann.data };
    },

   methods: {

          toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
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
    color:#f58aff
}
</style>
