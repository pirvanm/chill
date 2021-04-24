<template>
    <div class="row wrapper-playlist">
          <div class="col-md-3 leftBar ">
              <newLeftBar />
          </div>
        <div class="col-md-9">
            <div class="row container-playlist">
                <div class="col-md-2 amb">
                    <a href="/videos/ambiental"> Ambiental  </a>
                </div>
                <div class="col-md-2">Ambiental Meditate</div>
                <div class="col-md-2">  <a href="/videos/chillhop"> Chill Hop  </a>
                    </div>
                <div class="col-md-2">Chill Out </div>
                <div class="col-md-2">Chill Out Gaming</div>
                <div class="col-md-2">Chill Step</div>

                <div class="col-md-2">Classic</div>
                <div class="col-md-2">Classical Meditate</div>
                <div class="col-md-2">Down Tempo</div>

                <div class="col-md-2">Lo-Fi </div>
                <div class="col-md-2">Lo-Fi House</div>
                <div class="col-md-2">Lo-fi HipHop</div>


                <div class="col-md-2">Regional</div>
                <div class="col-md-2">Regional African</div>
                <div class="col-md-2">Regional Arabic</div>
                <div class="col-md-2">Regional Chinese</div>
                <div class="col-md-2">Regional France</div>
                <div class="col-md-2">Regional Indian</div>
                <div class="col-md-2">Regional Italy</div>
                <div class="col-md-2">Regional Japan</div>
                <div class="col-md-2">Regional Spanish</div>

                <div class="col-md-2">Lounge</div>
                <div class="col-md-2">World </div>
                <div class="col-md-2">Techno</div>
                <div class="col-md-2">Trap </div>


                <div class="col-md-2"> Mood</div>
                <div class="col-md-2">Yoga</div>
                <div class="col-md-2">Party</div>
                <div class="col-md-2">Study</div>
                <div class="col-md-2">Sleep</div>
            </div>
        </div>
    </div>
</template>

<style>
    .container-playlist div.col-md-2 {
        flex: 0 0 15.666667%;
        max-width: 15.666667%;
        height: 180px;
        background: darkseagreen;
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

    .amb {
        background: url("~assets/category/ambient.jpg");
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
</style>

<script>
import newLeftBar from "@/components/newLeftBar";

export default {
components: {
        newLeftBar
}}
</script>
