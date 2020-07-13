<template>
    <div>
        <meta name="keywords" content="keywords, separated, by, comma">
        <div class="bg-image"></div>
        <div class="loading-page" v-if="loading">
            <p>Loading...</p>
        </div>
        <div class="row video-grid">
            <div class="col-md-12">
                <h1 class="title">Latest Video
                </h1></div>
            <div class="col-md-3" v-for="video in videos" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>

<!--
        <div class="row video-grid">
            <div class="col-md-12"> <h1 class="title">Latest Video ChillHop</h1></div>
            <div class="col-md-3" v-for="video in chillHop" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>

        <div class="row video-grid">
            <div class="col-md-12"> <h1 class="title">Latest Video Ambiental </h1></div>
            <div class="col-md-3" v-for="video in chillAmbient" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>


        <div class="row video-grid">
            <div class="col-md-12"> <h1 class="title">Latest Video Lofi</h1></div>
            <div class="col-md-3" v-for="video in chillLofi" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>


        <div class="row video-grid">
            <div class="col-md-12">
                <h1 class="title">Latest Video Chillstep</h1></div>
            <div class="col-md-3" v-for="video in chillStep" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>



        <div class="row video-grid">
            <div class="col-md-12"> <h1 class="title">Latest Video ChillOut</h1></div>
            <div class="col-md-3" v-for="video in chillOut" :key="video.id">
                <div class="card text-left">
                    <nuxt-link :to="`/watch/${video.videoId}`" class="text-dark">
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>-->


    </div>

</template>

<script>
    import MenuBar from "~/components/Menu";

    export default {

        data: () => ({
            loading: false
        }),

        head () {
            return {
                title: 'Videos Pages | All Category ',
                meta: [
                    { hid: 'description',
                        name: 'description',
                        keyword:'aa',
                        content: 'All Videos  from every category' }
                ]
            }
        },
        components: {
            "menu-bar": MenuBar
        },
        async asyncData({ $axios, params })
        {
            let vid = await $axios.$get(`/videos`);
            let vlChillHop = await $axios.$get('/latest-videos-jazzy');
            let vlAmbient = await $axios.$get('/latest-videos-ambient');
            let vlLofi = await $axios.$get('/latest-videos-lofi');
            let vlChillStep = await $axios.$get('/latest-videos-chillstep');
            let vlChillOut = await $axios.$get('/latest-videos-chillout');
            let chann = await $axios.$get(`/channels`);

            return {
                videos: vid.data,
                chillHop: vlChillHop.data,
                chillAmbient: vlAmbient.data,
                chillLofi: vlLofi.data,
                chillStep: vlChillStep.data,
                chillOut: vlChillOut.data,
                channels: chann.data
            };
        },
        methods: {
            search() {
                this.$router.push(`/search?text=${this.form.text}`);
            },
            start () {
                this.loading = true
            },
            finish () {
                this.loading = false
            }

        }
    };
</script>



<style>
    ul.nav a {
        font-size: 15px;
        margin-top: 20px;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .card {
        margin-bottom: 50px;
        min-height: 200px;
        height: 365px;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }
    .video-grid {
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 2%;
    }

    .bg-info {
        padding-left: 10%;

        opacity: 0.7;

        background-color: white !important;
    }

    .bg-image {
        background: url("~assets/pa.png");
        height: 400px;
    }

    .navbar-dark .navbar-brand {
        color: #fd5e53;
    }

    .rigth-link {
        margin-right: 40px;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: purple;
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        padding: 0 !important;
        margin-left: auto;
    }

    h1.title{
        font-size: 50px;
        margin: 0;
        text-align: center;
        margin-bottom: 10px;
    }
    .vertical-menu
    {
        margin-left:2%;
    }
    .list-home {
        margin-top:20px;
    }
    .list-videos {
        margin-top:10px;
    }
    .list-helpfull
    {
        margin-top:10px;
    }

    .list-videos:first-child{
        font-weight: bold;
        font-size:16px;
    }

    .list-helpfull:first-child
    {
        font-weight: bold;
        font-size:16px;
    }
    a.logo {

        font-size: 15px;
        font-weight: bold;
        color: aliceblue;
        /* padding: 7px; */
        margin-bottom: 28px;
        margin-top: 53px;
        border-radius: 8px;
        margin-left: -29px;
    }
    .content {
        margin-top:30px;
    }
    .column p
    {
        color: grey;
        font-size: 18px;
        margin-top: 0;
        margin-bottom: 1rem;
        font-weight: bold;
        margin-top: 10px;
        padding-top: 6px;
        padding-bottom: 5px;
        text-align: center;
        background-color: aliceblue;
    }
    .fa-twitter,
    .fa-facebook-square
    {
        font-size: 25px;
        padding: 12px;
        color: white;
        background-color: black;
        border-radius: 28px;
        margin-right: 5px;
        margin-top: 10px;
    }
    .social-list{
        text-align: center;
    }
    .social-list h1{
        font-size: 24px;
        margin-top: 20px;
        font-weight: bold;
        text-decoration: underline;

    }
    .fa-headphones{
        color:purple;
    }
    a.logo {
        background-color: black;
        font-size: 17px;
        font-weight: bold;
        color: white;
        padding: 7px;
        margin-bottom: 28px;
        margin-top: 53px;
        border-radius: 8px;
        margin-left: -29px;
    }
    .list-videos li a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .list-videos a {

        margin-top:10px;
        padding-top:10px

    }

</style>


