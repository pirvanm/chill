<template>
    <div>
        <div class="row video-grid">
            <div class="col-md-3" v-for="(video, index) in videos" :key="index">
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
export default {
    computed: {
        videos() {
            return this.$store.getters["history/getVideos"];
        }
    }
};
</script>

<style></style>
