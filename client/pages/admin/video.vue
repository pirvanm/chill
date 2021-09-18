<template>
    <div>
        <!--  <h1>{{ title }}</h1>-->
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "Video Zone"
        };
    },
    head() {
        return {
            title: "maco",
            meta: [
                // hid is used as unique identifier. Do not use `vmid` for it as it will not work
                {
                    hid: "description",
                    name: "description",
                    content: "My custom description"
                }
            ]
        };
    }
};
</script>
