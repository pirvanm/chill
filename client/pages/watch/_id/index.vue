<template>
    <div>
        Loading.....
    </div>
</template>

<script>
export default {
    mounted() {
        this.gotoWatch();
    },
    methods: {
        gotoWatch() {
            this.$router.push(`/watch?v=${this.$route.params.id}`);
        }
    }
};
</script>

<style></style>
