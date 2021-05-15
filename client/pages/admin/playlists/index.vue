<template>
    <div class="container">
        <div class="row">
       <div class=" offset-6 col-6">
           <ul>
           <li>
               <a href="/admin/playlists/add" class=""> Add </a>
           </li>
               <li>
                   List
               </li>
               <li>
                   Edit
               </li>
           </ul>
       </div>
        </div>

        <div class="row">
            <div class="col-3">
                <menuAdmin/>
            </div>
        </div>
    </div>
</template>
<style>
ul li {
    display:inline-flex;
}
.container{
    margin-top:50px;
}
</style>

<script>
import menuAdmin from "@/components/MenuAdmin";

export default {
    components: {
        menuAdmin
    }}
</script>


