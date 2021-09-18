<template>
    <div class="container">
        stat
        <div class="row ">
            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 1</h5>
                    <p class="card-text">{{ stats.count1 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 2</h5>
                    <p class="card-text">{{ stats.count2 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 3</h5>
                    <p class="card-text">{{ stats.count3 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 4</h5>
                    <p class="card-text">{{ stats.count4 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 5</h5>
                    <p class="card-text">{{ stats.count5 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 6</h5>
                    <p class="card-text">{{ stats.count6 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 7</h5>
                    <p class="card-text">{{ stats.count7 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 8</h5>
                    <p class="card-text">{{ stats.count8 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 9</h5>
                    <p class="card-text">{{ stats.count9 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 10</h5>
                    <p class="card-text">{{ stats.count10 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 11</h5>
                    <p class="card-text">{{ stats.count11 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 12</h5>
                    <p class="card-text">{{ stats.count12 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Cat 13</h5>
                    <p class="card-text">{{ stats.count13 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Rock</h5>
                    <p class="card-text">{{ stats.count14 }}</p>
                    <!--                <a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>

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
