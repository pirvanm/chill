<template>
    <div class="row wrapper-playlist">
          <div class="col-md-3 leftBar ">
              <newLeftBar />
          </div>
        <div class="col-md-9">
            <div class="row container-videos">
                <div class="col-md-2 amb">
                    <a href="/videos/ambiental"> Ambiental  </a>
                </div>
                <div class="col-md-2 med">
                    <a href="/videos/ambiental-meditate"> Ambiental Meditate  </a>
                    </div>
                <div class=" card col-md-2 hop">  <a href="/videos/chillhop"> Chill Hop  </a>
                    </div>
                <div class="col-md-2 out"><a href="/videos/chillout"> Chill Out  </a></div>
                <div class="col-md-2 game"><a href="/videos/chillout-gaming"> Chill Out Gaming </a></div>
                <div class="col-md-2 step"><a href="/videos/chillstep"> ChillStep</a></div>
                <div class="col-md-2 rock "><a href="/videos/rock"> Rock </a></div>
                <div class="col-md-2 Classic"><a href="/videos/classic"> Classic</a></div>
                <div class="col-md-2 babe"><a href="/videos/classical"> Classical</a></div>
                <div class="col-md-2 down"><a href="/videos/downtempo"> DownTempo</a></div>
                <div class="col-md-2 lofih"><a href="/videos/lofi"> Lofi</a></div>
                <div class="col-md-2 lo-hi"><a href="/videos/lofi-hiphop"> Lofi HipHop</a></div>
                <div class="col-md-2 lo-ho"><a href="/videos/lofi-house"> Lofi House</a></div>
                <div class="col-md-2 regional-r"><a href="/videos/regional"> Regional </a></div>
                <div class="col-md-2 africa"><a href="/videos/regional-african"> African </a></div>
                <div class="col-md-2 arabia"><a href="/videos/regional-arabic"> Arabic </a></div>
                <div class="col-md-2 china"><a href="/videos/regional-chinese"> Chinese </a></div>
                <div class="col-md-2 france"><a href="/videos/regional-france"> France </a></div>
                <div class="col-md-2 india"><a href="/videos/regional-indian"> Indian </a></div>
                <div class="col-md-2 italy"><a href="/videos/regional-italy"> Italy </a></div>
                <div class="col-md-2 japan"><a href="/videos/regional-japan"> Japan </a></div>
                <div class="col-md-2 spain"><a href="/videos/regional-spanish"> Spanish </a></div>

                <div class="col-md-2 lounges"><a href="/videos/lounge"> Lounge </a></div>
                <div class="col-md-2 w"><a href="/videos/world"> World </a></div>
                <div class="col-md-2 tec"><a href="/videos/Techno"> Techno </a></div>
                <div class="col-md-2 traps "><a href="/videos/Trap"> Trap </a></div>

                <div class="col-md-2" disable> Mood</div>
                <div class="col-md-2" disable>Yoga</div>
                <div class="col-md-2" disable>Party</div>
                <div class="col-md-2" disable>Study</div>
                <div class="col-md-2" disable>Sleep</div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .container-playlist div.col-md-2 {
        flex: 0 0 15.666667%;
        max-width: 15.666667%;
        height: 180px;
        background:    #8422a6;;
        padding-top: 20px;
        margin: 10px 3px 5px 10px;
        border-radius: 10px;
        font-size: 18px;
        font-weight: bold;
        color: white;
    }
    img {
        width: 90px;
        height: 85px;
        float: right;
        margin-top: 30px;
        margin-left: 69px;
        position: absolute;
    }
    .container-videos{
    margin-left:20px;
    }
    .container-videos .col-md-2{
        margin-top: 46px;

        border-radius: 10px;
        /* background-image: url(photographer.jpg); */
        background-color: #cccccc;
        height: 250px;
        /* width: 277px; */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-size: 100% 100%;
        margin-right: 10px;
    }
    .amb {
        background: url("~assets/category/ambient.jpg");
    }
    .med{
        background: url("~assets/category/meditation.jpg");
    }
    .hop {
        background: url("~assets/category/chillhop.jpg");
    }
    .out {
        background: url("~assets/category/chillout.jpg");
    }
    .game {
        background: url("~assets/category/gaming.jpg");
    }
    .step {
        background: url("~assets/category/step.jpg");
    }
    .Classic{
        background: url("~assets/category/Classic.jpeg");
    }
    .babe{
        background: url("~assets/category/babe.jpg");
    }
    .down{
        background: url("~assets/category/down.jpeg");
    }

    .lofih{
        background: url("~assets/category/lo-fi.jpeg");
    }

    .lo-hi{
        background: url("~assets/category/lo-hi.jpeg");
    }
    .lo-ho {
        background: url("~assets/category/lo-ho.jpeg");
    }

    .regional-r{
        background: url("~assets/category/regional.jpg");
    }
    .africa {
        background: url("~assets/category/africa.jpg");
    }

    .china {
        background: url("~assets/category/china.jpeg");
     }

    .france {
        background: url("~assets/category/france.jpeg");
    }
    .india {
        background: url("~assets/category/indian.jpeg");
    }
    .italy {
        background: url("~assets/category/italy.jpg");
    }

    .japan {
        background: url("~assets/category/japan.jpeg");
    }

    .spain {
        background: url("~assets/category/spain.jpg");
    }

    .lounges{
        background: url("~assets/category/lounge.jpeg");
    }

    .tec {
        background: url("~assets/category/tec.jpeg");
    }

    .w {
        background: url("~assets/category/w.jpeg");
    }
    .traps {
        background: url("~assets/category/trap.jpeg");
    }

    .arabia {
        background: url("~assets/category/arabia.jpg");
    }

    .rock {
        background: url("~assets/category/rock.jpeg");
    }



    .leftBar {
        background-color: #090909;
        /* position: fixed; */
        /* margin-right: 100px; */
        margin-top: 0px;
        height: 100%;
        color: #8422a6;
        border-top-right-radius: 50px;
        /* opacity: 0.4; */
        height: 1600px;
        width: 110px;
        /* position: fixed; */
        z-index: 1;
        top: 0;
        /* left: 0; */
        /* background-color: #111; */
        overflow-x: hidden;
        padding-top: 50px;
        /* margin-left: 35px; */
        padding-bottom: 20px;
        padding-left: 50px;
    }
a {

    text-decoration: inherit;
    top: 50%;
    left: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    color: purple;
    font-weight: bold;
    font-size: 1.5em;
    padding: 5px;
}
</style>

<script>
import newLeftBar from "@/components/newLeftBar";

export default {
components: {
        newLeftBar
}}
</script>
