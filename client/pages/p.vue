<template>
    <div>


        <div class="row video-grid">


            <div class="col-md-3  chillhop">
                <a  href="/videos/chillhop" class="">ChillHop</a>
            </div>

            <div class="col-md-3  ambiental">
                <a  href="/videos/ambiental" class="">Ambiental</a>
            </div>
            <div class="col-md-3 lofi">
                <a  href="/videos/lofi" class="">Lofi</a>
            </div>
            <div class="col-md-3  lofi">
                <a  href="/videos/regional" class="">Regional</a>
            </div>

            <div class="col-md-3  chillstep">
                <a  href="/videos/chillstep" class="">Chillstep</a>
            </div>
            <div class="col-md-3  chillout">
                <a  href="/videos/chillout" class="">ChillOut</a>
            </div>
            <div class="col-md-3  downtempo">
                <a  href="/videos/downtempo" class="">Downtempo</a>
            </div>
            <div class="col-md-3  trap">
                <a  href="/videos/trap" class="">Trap</a>
            </div>

            <div class="col-md-3  clasic">
                <a  href="/videos/clasic" class="">Classic</a>
            </div>
            <div class="col-md-3  classical">
                <a  href="/videos/classical" class="">Classical</a>
            </div>
            <div class="col-md-3  lounge">
                <a  href="/videos/lounge" class="">Lounge</a>
            </div>
            <div class="col-md-3  world">
                <a  href="/videos/world" class="">World</a>
            </div>


        </div>








    </div>

</template>

<script>
    import MenuBar from "~/components/Menu";
    export default {
        data() {
            return {
                form: {
                    text: ""
                }
            };
        },
        head () {
            return {
                title: 'Chill Whispers | Chill All Genre',
                meta: [
                    { hid: 'description',
                        name: 'Chill Whispers ',
                        content: 'Custom App for making the atmosphere chill'
                    }
                ]
            }
        },
        components: {
            "menu-bar": MenuBar
        },
        async asyncData({ $axios, params })
        {
            let vid = await $axios.$get(`/videos`);
            let vlChillHop = await $axios.$get('/latest-videos-jazzy');
            let vlAmbient = await $axios.$get('/latest-videos-ambient');
            let vlLofi = await $axios.$get('/latest-videos-lofi');
            let vlChillStep = await $axios.$get('/latest-videos-chillstep');
            let vlChillOut = await $axios.$get('/latest-videos-chillout');
            let chann = await $axios.$get(`/channels`);

            return {
                videos: vid.data,
                chillHop: vlChillHop.data,
                chillAmbient: vlAmbient.data,
                chillLofi: vlLofi.data,
                chillStep: vlChillStep.data,
                chillOut: vlChillOut.data,
                channels: chann.data
            };
        },
        methods: {
            search() {
                this.$router.push(`/search?text=${this.form.text}`);
            }
        }
    };
</script>



<style>
    ul.nav a {
        font-size: 15px;
        margin-top: 20px;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .video-grid {
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 2%;
    }

    .bg-info {
        padding-left: 10%;

        opacity: 0.7;

        background-color: white !important;
    }

    .bg-image {
        background: url("~assets/pa.png");
        height: 400px;
    }

    .latest {
        margin: auto;
        font-family: 'East Sea Dokdo', ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:#fff;
        background-image: linear-gradient(315deg,  #ffff00  10%  ,blue  70% );

    }

    .navbar-dark .navbar-brand {
        color: #fd5e53;
    }

    .rigth-link {
        margin-right: 40px;
    }

    .navbar-dark .navbar-nav .nav-link {
        color: purple;
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        padding: 0 !important;
        margin-left: auto;
    }


    .downtempo {
        margin: 0;margin: auto;
        font-family: 'Palanquin Dark', ;
        border: 4px solid #8FB3E7;
        color: black;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;
        background-image: linear-gradient(135deg, black 0%, grey 100%);
    }


    .chillhop {
        margin: 0;margin: auto;
        font-family: 'Yellowtail', ;
        border: 4px solid #8FB3E7;
        color: white;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;
        background-image: linear-gradient(135deg, #fd5e53 0%, grey 100%);
    }
    .ambiental {

        margin: 0;margin: auto;
        font-family: 'Akronim', ;
        border: 4px solid #8FB3E7;
        color: #c0514a;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;
        background-image: linear-gradient(135deg, white 0%, blue 100%);
    }
    .lofi{
        background: radial-gradient(#e66465, #9198e5);
        margin: 0;margin: auto;
        font-family: 'Akronim', ;
        border: 4px solid #8FB3E7;
        color: #FFFFCC;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;


    }

    .chillstep{
        background: radial-gradient(#e66465, #9198e5);
        margin: 0;margin: auto;
        font-family: 'Akronim', ;
        border: 4px solid #8FB3E7;
        color: white;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;

        background-color: #f9484a;
        background-image: linear-gradient(315deg, #f9484a 0%, #fbd72b 74%);
    }


    .chillout{

        background: radial-gradient(#e66465, #9198e5);
        margin: 0;margin: auto;
        font-family: 'Akronim', ;
        border: 4px solid #8FB3E7;
        color: #00bfff;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #8BC6EC;

        background-color: #f9484a;
        background-image: linear-gradient(180deg, #00ffff  0%, #42378F 74%);

    }

    .trap {
        margin: 0;margin: auto;
        font-family: 'Electrolize', ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:white;
        background-image: linear-gradient(315deg, #39CCCC 40%, #111111 60%);
    }

    .clasic {
        margin: 0;margin: auto;
        font-family: 'Oldenburg', ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:white;
        background-image: linear-gradient(315deg, #000 45%, #650000 65%);
    }

    .classical {
        margin: 0;
        margin: auto;
        font-family: 'Single Day' ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:black;
        background-image: linear-gradient(180deg, #33ccff ,white , #99ff33 );
    }


    .lounge {
        margin: 0;
        margin: auto;
        font-family: 'Quicksand', ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:#ffff00;
        background-image: linear-gradient(315deg,  #c2b280  10%  , #ff0000  70% );
    }

    .world
    {
        margin: 0;
        margin: auto;
        font-family: 'East Sea Dokdo', ;
        border: 4px solid #8FB3E7;
        font-size: 56px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9484a;
        color:#fff;
        background-image: linear-gradient(315deg,  #ffff00  10%  ,blue  70% );
    }
    .col-md-3{
        margin-right:1px;
        width: 200px;
        height: 200px;
    }

    .card {
        margin-bottom: 5px;
        /* margin-bottom: 50px; */
        /* min-height: 200px; */

        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        min-width: 0;
        /* word-wrap: break-word; */
        /* background-color: #fff; */
        /* background-clip: border-box; */
        /* border: 1px solid rgba(0, 0, 0, 0.125); */
        border-radius: 0.25rem;
    }

</style>


