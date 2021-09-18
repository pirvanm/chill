<template> </template>

<script>
export default {
    middleare: ["auth"],
    mounted() {
        this.$auth.logout();
        this.$router.push("/logout");
    }
};
</script>

<style></style>
