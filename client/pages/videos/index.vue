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
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="category-card">
                                <img src="~assets/category/ambient.jpg"/>
                                    <div><a href="#category-link" class="category">Ambiental</a>
                                        <div class="cat-buttons">
                                            <nuxt-link to="/videos/ambiental">
                                                <a href="#play-link" class="start" title="start playlist">
                                                   <font-awesome-icon icon="play"></font-awesome-icon>
                                                </a>
                                            </nuxt-link>
                                            <nuxt-link to="/videos/ambiental">
                                                <a href="#category-link" class="list" title="see playlist">
                                                    <font-awesome-icon icon="play"></font-awesome-icon>
                                                </a>
                                            </nuxt-link>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/meditation.jpg"/>
                                <div><a href="#category-link" class="category">Ambiental Meditate</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/chillhop.jpg"/>
                                <div><a href="#category-link" class="category">Chill Hop</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/chillout.jpg"/>
                                <div><a href="#category-link" class="category">Chill Out </a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/gaming.jpg"/>
                                <div><a href="#category-link" class="category">Chill Out Gaming </a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/step.jpg"/>
                                <div><a href="#category-link" class="category">Chillstep</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/rock.jpeg"/>
                                <div><a href="#category-link" class="category">Rock</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/babe.jpg"/>
                                <div><a href="#category-link" class="category">Classic</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/Classic.jpeg"/>
                                <div><a href="#category-link" class="category">Classical</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/down.jpeg"/>
                                <div><a href="#category-link" class="category">DownTempo</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-fi.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-hi.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi HipHop</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lo-ho.jpeg"/>
                                <div><a href="#category-link" class="category">Lofi House</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/regional.jpg"/>
                                <div><a href="#category-link" class="category">Regional</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/africa.jpg"/>
                                <div><a href="#category-link" class="category">African</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/arabia.jpg"/>
                                <div><a href="#category-link" class="category">Arabic</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/china.jpeg"/>
                                <div><a href="#category-link" class="category">Chinese</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/france.jpeg"/>
                                <div><a href="#category-link" class="category">France</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/indian.jpeg"/>
                                <div><a href="#category-link" class="category">Indian</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/italy.jpg"/>
                                <div><a href="#category-link" class="category">Italy</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/japan.jpeg"/>
                                <div><a href="#category-link" class="category">Japan</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/spain.jpg"/>
                                <div><a href="#category-link" class="category">Spanish</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/lounge.jpeg"/>
                                <div><a href="#category-link" class="category">Lounge</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/w.jpeg"/>
                                <div><a href="#category-link" class="category">World</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/tec.jpeg"/>
                                <div><a href="#category-link" class="category">Techno</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4"  >
                            <div class="category-card">
                                <img src="~assets/category/trap.jpeg"/>
                                <div><a href="#category-link" class="category">Trap</a>
                                    <div class="cat-buttons">
                                        <nuxt-link to="/videos/ambiental">
                                            <a href="#play-link" class="start" title="start playlist">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                            </a></nuxt-link>
                                        <nuxt-link to="/videos/ambiental"><a href="#category-link" class="list" title="see playlist">
                                            <i class="fa fa-indent" aria-hidden="true"></i></a>
                                        </nuxt-link>
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

    .category-card img {
        height: 220px;
        width: 100%;
    }

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
