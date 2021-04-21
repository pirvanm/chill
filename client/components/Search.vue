<template>
    <div>
        <client-only>
            <autocomplete
                :search="searchVideo"
                placeholder="Search Video"
                :get-result-value="getResultValue"
                @submit="onSubmit"
            ></autocomplete>
        </client-only>
        <!-- <input type="text" placeholder="Search" v-model="search" /> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            search: "",
            data: [],
            timeOut: null
        };
    },
    // watch: {
    //     search() {
    //         this.searchVideo();
    //     }
    // },
    methods: {
        searchVideo(input) {
            return new Promise(resolve => {
                if (input.length < 1) {
                    return resolve([]);
                }
                if (this.timeOut) {
                    clearTimeout(this.timeOut);
                }
                this.timeOut = setTimeout(() => {
                    this.$axios
                        .post("/search-elastic", {
                            search: input
                        })
                        .then(response => {
                            resolve(response.data.data);
                            console.log(response.data);
                        });
                }, 200);

                // fetch(`${process.env.baseUrl}search-elastic`)
                //     .then(response => response.json())
                //     .then(data => {
                //         resolve(data.data.videos);
                //     });
            });
            // this.$axios
            //     .post("/search-elastic", {
            //         search: this.search
            //     })
            //     .then(response => {
            //         return response.data;
            //         console.log(response.data);
            //     });
        },
        getResultValue(result) {
            return result.title;
        },
        onSubmit(result) {
            this.$router.push(`/watch?v=${result.videoId}`);
        }
    }
};
</script>

<style></style>
