<template>
    <div class="body">
        <div class="main">
            <div class="heading">
                <!--            <button type="submit" v-on:click=toggleSidebar()>-->
                <!--                <i class="fa fa-bars"></i>Menu</button>-->

                <button type="submit" v-on:click=toggleSidebar()>
                    <i class="fas fa-bars"></i></button>
                <span class="title">Chillwhispers</span>
            </div>
            <newLeftBar />
            <div class="content">
                <div>
                    <search />
                </div>
                <div class="clearfix"></div>
                <div class="container">
                    <div class="row">
<!--                        <div class="col-lg-3 col-md-6 mb-4">-->
<!--                            <div class="category-card">-->
<!--                                <img src="~assets/category/ambient.jpg"/>-->
<!--                                    <div><a href="#category-link" class="category">Ambiental</a>-->
<!--                                        <div class="cat-buttons">-->
<!--                                            <nuxt-link to="/videos/ambiental">-->
<!--                                                <a href="#play-link" class="start" title="start playlist">-->
<!--                                                   <font-awesome-icon icon="play"></font-awesome-icon>-->
<!--                                                </a>-->
<!--                                            </nuxt-link>-->
<!--                                            <nuxt-link to="/videos/ambiental">-->
<!--                                                <a href="#category-link" class="list" title="see playlist">-->
<!--                                                    <font-awesome-icon icon="play"></font-awesome-icon>-->
<!--                                                </a>-->
<!--                                            </nuxt-link>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                        </div>-->

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/ambient.jpg"/>
                                <div>
                                    <a  class="category">Ambiental </a>
                                    <div class="cat-buttons">

                                            <a href="/playlists/Top-Ambiental" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a>


                                            <a href="/videos/ambiental" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                            </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/meditation.jpg"/>
                                <div><a href="#category-link" class="category">Ambiental
                                    <br>Meditate</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Medidate" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/ambiental-meditate" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/chillhop.jpg"/>
                                <div>
                                    <a href="#category-link" class="category">Chill Hop</a>
                                    <div class="cat-buttons">

                                            <a href="/playlists/Top-ChillHop" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a>


                                            <a href="/videos/chillhop" class="list" title="see playlist">
                                                <i class="fa fa-indent" aria-hidden="true"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/chillout.jpg"/>
                                <div><a href="#category-link" class="category">Chill Out</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-chillout" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/chillout" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/gaming.jpg"/>
                                <div><a href="#category-link" class="category">Chill Out Gaming </a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-gaming2" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/chillout-gaming" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/step.jpg"/>
                                <div><a href="#category-link" class="category">Chillstep</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Chillstep" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/chillstep" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/rock.jpeg"/>
                                <div><a href="#category-link" class="category">Rock</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-rock" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/rock" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/babe.jpg"/>
                                <div><a href="#category-link" class="category">Classic</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-Classic" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/classic" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/Classic.jpeg"/>
                                <div><a href="#category-link" class="category">Classical</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Classical" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/classical" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/down.jpeg"/>
                                <div><a href="" class="category">DownTempo</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-DownTempo" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>
                                        <a href="/videos/downtempo" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-fi.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Lo-fi-Hip-Hop" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/lofi" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-hi.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi HipHop</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Lofi-House" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/lofi-hiphop" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-ho.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi House</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-Lofi-House" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/lofi-house" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/regional.jpg"/>
                                <div><a href="#category-link" class="category">Regional</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-regional" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/africa.jpg"/>
                                <div><a href="#category-link" class="category">African</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-african" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-african" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/arabia.jpg"/>
                                <div><a href="#category-link" class="category">Arabic</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-arabia" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-arabic" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/china.jpeg"/>
                                <div><a href="#category-link" class="category">Chinese</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-chinese" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-chinese" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/france.jpeg"/>
                                <div><a href="#category-link" class="category">France</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-france" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-france" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/indian.jpeg"/>
                                <div><a href="#category-link" class="category">Indian</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-indian" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-indian" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/italy.jpg"/>
                                <div><a href="#category-link" class="category">Italy</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-italy" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-italy" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/japan.jpeg"/>
                                <div><a href="#category-link" class="category">Japan</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-japan" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-japan" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/spain.jpg"/>
                                <div><a href="#category-link" class="category">Spanish</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-spanish" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/regional-spanish" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lounge.jpeg"/>
                                <div><a href="#category-link" class="category">Lounge</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-lounge" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/lounge" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/w.jpeg"/>
                                <div><a href="#category-link" class="category">World</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/Top-World" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/world" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/tec.jpeg"/>
                                <div><a href="#category-link" class="category">Techno</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-techno" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/techno" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/trap.jpeg"/>
                                <div><a href="#category-link" class="category">Trap</a>
                                    <div class="cat-buttons">
                                        <a href="/playlists/top-trap" class="start" title="start playlist">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </a>


                                        <a href="/videos/trap" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
<!--        <div class="col-md-9">-->
<!--            <div class="row container-videos">-->
<!--                <div class="col-md-2 amb">-->
<!--                    <nuxt-link to="/videos/ambiental"> Ambiental  </nuxt-link>-->
<!--                </div>-->
<!--                <div class="col-md-2 med">-->
<!--                    <nuxt-link to="/videos/ambiental-meditate"> Ambiental Meditate  </nuxt-link>-->
<!--                    </div>-->
<!--                <div class=" card col-md-2 hop">  <nuxt-link to="/videos/chillhop"> Chill Hop  </nuxt-link>-->
<!--                    </div>-->
<!--                <div class="col-md-2 out"><nuxt-link to="/videos/chillout"> Chill Out  </nuxt-link></div>-->
<!--                <div class="col-md-2 game"><nuxt-link to="/videos/chillout-gaming"> Chill Out Gaming </nuxt-link></div>-->
<!--                <div class="col-md-2 step"><nuxt-link to="/videos/chillstep"> ChillStep</nuxt-link></div>-->
<!--                <div class="col-md-2 rock "><nuxt-link to="/videos/rock"> Rock </nuxt-link></div>-->
<!--                <div class="col-md-2 Classic"><nuxt-link to="/videos/classic"> Classic</nuxt-link></div>-->
<!--                <div class="col-md-2 babe"><nuxt-link to="/videos/classical"> Classical</nuxt-link></div>-->
<!--                <div class="col-md-2 down"><nuxt-link to="/videos/downtempo"> DownTempo</nuxt-link></div>-->
<!--                <div class="col-md-2 lofih"><nuxt-link to="/videos/lofi"> Lofi</nuxt-link></div>-->
<!--                <div class="col-md-2 lo-hi"><nuxt-link to="/videos/lofi-hiphop"> Lofi HipHop</nuxt-link></div>-->
<!--                <div class="col-md-2 lo-ho"><nuxt-link to="/videos/lofi-house"> Lofi House</nuxt-link></div>-->
<!--                <div class="col-md-2 regional-r"><nuxt-link to="/videos/regional"> Regional </nuxt-link></div>-->
<!--                <div class="col-md-2 africa"><nuxt-link to="/videos/regional-african"> African </nuxt-link></div>-->
<!--                <div class="col-md-2 arabia"><nuxt-link to="/videos/regional-arabic"> Arabic </nuxt-link></div>-->
<!--                <div class="col-md-2 china"><nuxt-link to="/videos/regional-chinese"> Chinese </nuxt-link></div>-->
<!--                <div class="col-md-2 france"><nuxt-link to="/videos/regional-france"> France </nuxt-link></div>-->
<!--                <div class="col-md-2 india"><nuxt-link to="/videos/regional-indian"> Indian </nuxt-link></div>-->
<!--                <div class="col-md-2 italy"><nuxt-link to="/videos/regional-italy"> Italy </nuxt-link></div>-->
<!--                <div class="col-md-2 japan"><nuxt-link to="/videos/regional-japan"> Japan </nuxt-link></div>-->
<!--                <div class="col-md-2 spain"><nuxt-link to="/videos/regional-spanish"> Spanish </nuxt-link></div>-->

<!--                <div class="col-md-2 lounges"><nuxt-link to="/videos/lounge"> Lounge </nuxt-link></div>-->
<!--                <div class="col-md-2 w"><nuxt-link to="/videos/world"> World </nuxt-link></div>-->
<!--                <div class="col-md-2 tec"><nuxt-link to="/videos/Techno"> Techno </nuxt-link></div>-->
<!--                <div class="col-md-2 traps "><nuxt-link to="/videos/Trap"> Trap </nuxt-link></div>-->

<!--                <div class="col-md-2" disable> Mood</div>-->
<!--                <div class="col-md-2" disable>Yoga</div>-->
<!--                <div class="col-md-2" disable>Party</div>-->
<!--                <div class="col-md-2" disable>Study</div>-->
<!--                <div class="col-md-2" disable>Sleep</div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    </div>
</template>

<style scoped>

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

    body {
        background: #0f2027;
        background: -webkit-linear-gradient(to right, #2c5364, #203a43, #0f2027);
        background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
    }

    .main {
        margin: auto;
        width: 100%;
        max-width: 1400px;
        display: flex;
        flex-direction: row;
    }
    .main .heading {
        display: none;
    }
    @media (max-width: 768px) {
        .main {
            display: block;
        }
        .main .heading {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .main .heading .title {
            font-size: 20px;
            color: #f58aff;
            letter-spacing: 0.5px;
        }
        .main .heading button {
            padding: 0 10px;
            background: transparent;
            color: #fff;
            font-size: 28px;
            line-height: 20px;
            border: none;
            cursor: pointer;
        }
        .main .heading button i:before {
            font-family: "FontAwesome";
        }
    }

    h1 {
        margin: 15px 0;
        color: #eee;
        text-shadow: 1px 0px 3px #f58aff;
    }

    h2 {
        color: #eee;
        text-shadow: 1px 0px 3px #f58aff;
    }

    .breadcrumbs {
        margin: 25px 0 -15px;
        color: #eee;
    }
    .breadcrumbs a {
        color: #d303fc;
        text-decoration: none;
    }
    .breadcrumbs a:hover {
        font-weight: 600;
    }

    .sidebar {
        width: 160px;
        transition: all 0.3s ease-in-out;
    }
    .sidebar nav {
        display: flex;
        padding: 0 10px;
        flex-direction: column;
        height: 100%;
        justify-content: center;
        align-items: flex-end;
        background-color: #3a3a3a;
        position: fixed;
        transition: all 0.3s ease-in-out;
        transform: translateX(0);
    }
    .sidebar nav a {
        text-decoration: none;
        width: 100%;
        text-align: right;
        color: #f58aff;
        padding: 5px 10px;
        font-size: 22px;
        transition: all 0.5s ease-in-out;
        box-sizing: border-box;
    }
    .sidebar nav a.active, .sidebar nav a:hover {
        /*background-color: #181818;*/
        outline: 1px solid #0c0c0c;
        transform: translateX(9px);
        box-shadow: -5px 1px 3px 0px #4e4e4e;
    }
    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }
        .sidebar nav {
            transform: translateX(-100%);
        }
        .sidebar.shown {
            display: block;
        }
        .sidebar.shown nav {
            transform: translateX(0);
            justify-content: start;
            box-shadow: 3px 3px 10px 3px #f58aff;
            z-index: 100;
        }
        .sidebar.shown + .content {
            transform: translateX(150px);
        }
        .sidebar.shown + .content:after {
            content: "";
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #543c52cc;
            z-index: 10;
        }
    }

    .content {
        flex-grow: 1;
        padding: 20px;
        transition: all 0.3s ease-in-out;
    }

    .search-form input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid transparent;
        float: left;
        width: 90%;
        max-width: calc(100% - 40px);
        background: #f1f1f1;
    }
    .search-form button {
        float: left;
        width: 10%;
        padding: 10px;
        min-width: 40px;
        background: #4dff61;
        color: white;
        font-size: 17px;
        border: 1px solid transparent;
        border-left: none;
        cursor: pointer;
    }
    .search-form button:hover {
        filter: saturate(2);
    }
    .search-form button i:before {
        font-family: "FontAwesome";
    }

    .row {
        margin-bottom: 2rem;
    }

    .video-card {
        position: relative;
        background-color: #3a3a3a;
        border-radius: 5px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }
    .video-card img {
        width: 100%;
        height: auto;
    }
    .video-card .title {
        margin: 15px;
        color: #eee;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 1.2rem;
    }
    .video-card .category {
        color: #d303fc;
        text-decoration: none;
        display: inline-block;
        padding: 5px 10px 5px 15px;
        background-color: #ccc;
        font-size: 1.1rem;
        position: relative;
    }
    .video-card .category:after {
        content: "";
        display: block;
        height: 100%;
        width: 36px;
        position: absolute;
        top: 0;
        right: -36px;
        border-top: 18px solid #ccc;
        border-left: 18px solid #ccc;
        border-right: 18px solid transparent;
        border-bottom: 18px solid transparent;
    }
    .video-card .category:hover {
        font-weight: 600;
    }
    .video-card .anchor {
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }
    .video-card:hover {
        transform: translate(-3px, -3px);
        /*box-shadow: 3px 3px 9px 3px #4e4e4e, 0 0 0 3px #d303fc;*/
    }

    .category-card {
        position: relative;
        overflow: hidden;
    }
    .category-card img {
        width: 100%;
    }
    .category-card > a {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        text-decoration: none;
        font-size: 1.4rem;
        font-weight: 600;
        color: #f58aff;
        text-shadow: 1px 1px 2px #4e4e4e;
        transition: all 0.3s ease-in-out;
    }
    .category-card:hover img,
    .category-card:hover > a {
        /*filter: grayscale(60%);*/
    }
    .category-card .cat-buttons {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
    @media (min-width: 768px) {
        .category-card .cat-buttons {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            visibility: hidden;
        }
    }
    .category-card .cat-buttons a {
        color: #f58aff;
        font-size: 38px;
        /*background-color: #eee;*/
        padding: 5px 15px;
        border-radius: 50%;
    }
   @media (max-width: 768px) {
    .category-card .cat-buttons a[data-v-332576d4] {
    font-size: 26px;
    padding: 5px 93px;
    border-radius: 3px;
    margin-top: -138px;
    position: relative;
}
   }
    .category-card .cat-buttons a:hover {
        color: #d303fc;
    }
    @media (max-width: 768px) {
        .category-card .cat-buttons a {
            font-size: 26px;
            padding: 5px 40px;
            border-radius: 3px;
            margin-top: 10px;
            position: relative;
        }
    }

    @media (min-width: 1268px) {
        .category-card img {
            height: 159px;
        }
    }
    .category-card .cat-buttons i:before {
        font-family: "FontAwesome";
    }
    .category-card:hover .cat-buttons {
        visibility: visible;
    }

    .wrap-vid {
        position: relative;
     
        /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .wrap-vid iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /*.category-card img {*/
    /*    height: 220px;*/
    /*    width: 100%;*/
    /*}*/
    .list ,
    .start {
        /*margin-top:30px;*/


    }

    .start {
        float:left;
        margin-left: -101px;
    }

    .list{
        float:right;
        margin-left: 87px;
    }

    .category-card a:hover {

    }

    /*.category-card img {*/
    /*    height: 159px;*/
    /*}*/

</style>

<script>
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import { fas } from '@fortawesome/free-solid-svg-icons'
import { faGithub } from '@fortawesome/free-brands-svg-icons'
export default {
components: {
    newLeftBar,
    newFooter,
    search
},
    methods: {
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
        },
    }
}
</script>
