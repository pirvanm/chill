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
        },
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
        },
    
    }
};
</script>

<style></style>
