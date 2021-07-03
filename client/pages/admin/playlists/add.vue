<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center border pr-2 mr-2">
                <h1>Filters</h1>

                <div class="form-group col-md-12 pr-2 mr-2">
                    <h1 for="inputState">#1 Filter Pick a Category</h1>
                    <select
                        id="inputState"
                        class="form-control"
                        v-model="filter.category"
                    >
                        <option selected value="">Choose...</option>

                        <option
                            v-for="cat in categories.data"
                            :key="cat.id"
                            :value="cat.category_name"
                        >
                            {{ cat.category_name }}
                        </option>
                    </select>
                </div>
                <label for="inputState">#2 Pick Duration</label>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="inlineRadioOptions"
                        id="inlineRadio1"
                        :value="1"
                        v-model="filter.duration"
                    />
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="inlineRadioOptions"
                        id="inlineRadio2"
                        :value="2"
                        v-model="filter.duration"
                    />
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="inlineRadioOptions"
                        id="inlineRadio3"
                        :value="3"
                        v-model="filter.duration"
                    />
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>

                <form>
                    <div class="form-group">
                        <label for="inputState"
                            >#3 Chouse Number of Views</label
                        >

                        <input
                            type="range"
                            class="form-control-range"
                            id="formControlRange"
                        />
                    </div>

                    <div class="form-group">
                        <label for="inputState">#4 Type a Title</label>

                        <input type="text" class="form-control" id="title" />
                    </div>

                    <div class="form-group">
                        <label for="inputState">#5 Type a Tagg</label>

                        <input type="text" class="form-control" id="tagg" />
                    </div>
                </form>
            </div>

            <div class="col-md-4 border pr-2">
                <h1>
                    New Playlist / count(total video)
                </h1>
            </div>

            <div class="col-md-4 border ml-2">
                <h1>List of posible Songs / count({{ videos.meta.total }})</h1>
                <hr />
                <p v-for="video in videos.data" :key="video.id">
                    {{ video.title }}
                </p>

                <client-only placeholder="Loading...">
                    <pagination
                        v-model="videos.meta.current_page"
                        :records="videos.meta.total"
                        @paginate="myCallback"
                        :per-page="videos.meta.per_page"
                        :chunk="3"
                    />
                </client-only>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    async asyncData({ query, params, error, $axios }) {
        const videos = await $axios.$get(`/admin/videos`);
        const categories = await $axios.$get(`/admin/categories`);
        return { videos, categories };
    },
    data() {
        return {
            filter: {
                category: "",
                duration: 1
            }
        };
    },
    watch: {
        filter: {
            // This will let Vue know to look inside the array
            deep: true,

            // We have to move our method to a handler field
            handler() {
                this.filterVideo();
            }
        }
    },
    methods: {
        myCallback() {
            this.$axios
                .get(`/admin/videos?page=${this.videos.meta.current_page}`)
                .then(response => {
                    (this.videos.data = response.data.data),
                        (this.videos.meta = response.data.meta);
                });
        },
        filterVideo() {
            this.$axios
                .get(
                    `/admin/videos?category=${this.filter.category}&duration=${this.filter.duration}`
                )
                .then(response => {
                    (this.videos.data = response.data.data),
                        (this.videos.meta = response.data.meta);
                });
        }
    }
};
</script>
<style scoped>
.container {
    margin-top: 50px;
}
</style>
