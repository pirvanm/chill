<template>
    <div>
        <div class="bg-image"></div>

        <div class="row">
            <div class="col-md-3 offset-md-4">
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
                    <button class="btn btn-success" @click="searchVideo">
                        Search
                    </button>
                </center>
            </div>
        </div>
        <div class="row video-grid">
            <div class="col-md-3" v-for="video in videos" :key="video.id">
                <div class="card text-left">
                    <nuxt-link
                        :to="`/watch/${video.videoId}`"
                        class="text-dark"
                    >
                        <img class="card-img-top" :src="video.thumbnail" alt />
                        <div class="card-body">
                            <h4 class="card-title">{{ video.title }}</h4>
                            <p>{{ video.published_at }}</p>
                        </div>
                    </nuxt-link>
                </div>
            </div>
        </div>
        <hr />
    </div>
</template>

<script>
import MenuBar from "~/components/Menu";
export default {
    data() {
        return {
            videos: [],
            form: {
                text: this.$route.query.text ? this.$route.query.text : null
            }
        };
    },
    components: {
        "menu-bar": MenuBar
    },
    mounted() {
        this.searchVideo();
    },
    methods: {
        searchVideo() {
            this.$axios.post("/search", this.form).then(response => {
                this.videos = response.data.videos;
                console.log(response);
            });
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
