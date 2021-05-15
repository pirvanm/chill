
<template>
    <div>
        stat
        <div class="col-md-3" v-for="stat in stats">

{{ stat }}
    </div>
    </div>
</template>



<script>
import Multiselect from "vue-multiselect";
import  menuAdmin from '@/components/MenuAdmin';


export default {
    components: {

        menuAdmin
    },
    async asyncData ({ $axios, params }) {
        let stats = await $axios.$get(`/stats`)
        return { stats: stat.data, }
    },

}
</script>
