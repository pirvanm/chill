<template>
    <div>
        <h3 class="text-center pt-12" v-if="tag">{{ tag.name }}</h3>
        <div class="row video-grid">
            <div class="col-md-3" v-for="video in videos" :key="video.id">
                <div class="card text-left">
                    <nuxt-link
                        :to="`/watch?v=${video.videoId}`"
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
            tag: null,
            videos: []
        };
    },
    components: {
        "menu-bar": MenuBar
    },
    mounted() {
        this.getVideos();
    },
    methods: {
        getVideos() {
            this.$axios
                .post(`/tag`, {
                    id: this.$route.query.id
                })
                .then(response => {
                    this.videos = response.data.videos;
                    this.tag = response.data.tag;
                    console.log(response);
                });
        }
    }
};
</script>

<style></style>
