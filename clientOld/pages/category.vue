<template>
    <div>
        <div class="bg-image"></div>

        <div class="row">
            <div class="col-md-3 offset-md-4">
                <form @submit.prevent="search">
                    <div class="form-group">
                        <label>Search</label>
                        <input
                                type="text"
                                class="form-control"
                                placeholder="Search"
                                aria-describedby="helpId"
                                v-model="form.text"
                        />
                    </div>
                    <center>
                        <button class="btn btn-success">Search</button>
                    </center>
                </form>
            </div>
        </div>
        <div class="row video-grid">
            <div class="col-md-12">Latest Video</div>
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


        <div class="row video-grid">
            <div class="col-md-12">Latest Video ChillHop</div>
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
            <div class="col-md-12">Latest Video Ambiental</div>
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
            <div class="col-md-12">Latest Video Lofi</div>
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
            <div class="col-md-12">Latest Video Chillstep</div>
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
            <div class="col-md-12">Latest Video ChillOut</div>
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
        </div>


    </div>

</template>

<script>
    import MenuBar from "~/components/Menu";
    export default {
        data() {
            return {
                form: {
                    text: ""
                }
            };
        },
        head () {
            return {
                title: 'this is your title',
                meta: [
                    { hid: 'description', name: 'description', content: 'this is your description' }
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
</style>


