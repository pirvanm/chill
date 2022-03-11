<template>
    <div class="container">
     
        <div class="row ">
        <div class="col-3">
     <menuAdmin />
        </div>
        <div class="col-9">
            <div class="row">


               <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title"> Total All</h5>
                    <p class="card-text">{{ stats.count0 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">ChillHop</h5>
                    <p class="card-text">{{ stats.count1 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Ambiental</h5>
                    <p class="card-text">{{ stats.count2 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Lofi</h5>
                    <p class="card-text">{{ stats.count3 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Regional</h5>
                    <p class="card-text">{{ stats.count4 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Chillstep</h5>
                    <p class="card-text">{{ stats.count5 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">ChillOut</h5>
                    <p class="card-text">{{ stats.count6 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Downtempo</h5>
                    <p class="card-text">{{ stats.count7 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Trap</h5>
                    <p class="card-text">{{ stats.count8 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Classic</h5>
                    <p class="card-text">{{ stats.count9 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Classical</h5>
                    <p class="card-text">{{ stats.count10 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Lounge</h5>
                    <p class="card-text">{{ stats.count11 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">World</h5>
                    <p class="card-text">{{ stats.count12 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" >
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Techno</h5>
                    <p class="card-text">{{ stats.count13 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Rock</h5>
                    <p class="card-text">{{ stats.count14 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>

    </div>  </div>
        <!--      -->
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import menuAdmin from "@/components/MenuAdmin";

export default {
    middleware: ["admin"],
    components: {
        menuAdmin
    },
    async asyncData({ $axios, params }) {
        let statistics = await $axios.$get(`/stats`);

        return { stats: statistics };
    }
};
</script>
