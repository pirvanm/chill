<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <menuAdmin />
            </div>
            <div class="col-md-6">
                <nuxt-link
                    class="btn btn-sm btn-success float-right"
                    to="/admin/playlists/add"
                >
                    Add
                </nuxt-link>
                <p>Playlist Lists</p>
                <p v-for="playlist in playlists" :key="playlist.id">
                    {{ playlist.name }}
                </p>
            </div>
        </div>

        <div class="row"></div>
    </div>
</template>
<style>
ul li {
    display: inline-flex;
}
.container {
    margin-top: 50px;
}
</style>

<script>
import menuAdmin from "@/components/MenuAdmin";

export default {
    components: {
        menuAdmin
    },
    asyncData({ query, params, error, $axios }) {
        return $axios.$get(`/admin/playlists`).then(res => {
            return {
                playlists: res.data
            };
        });
    },
    data() {
        return {};
    },

    mounted() {},
    methods: {}
};
</script>
