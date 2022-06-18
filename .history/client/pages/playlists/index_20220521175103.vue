<template>
    <div class="body">
        <div class="main">
            <div class="heading">
                <button type="submit" @click="toggleSidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="title">Chillwhispers</span>
            </div>
            <newLeftBar />
            <div class="content">
                <div>
                    <search />
                </div>

            <div class="row">
                <div class="col-lg-2 d-none d-sm-block">

                    
                    <div class="container"> 
            <h3> Filter By: </h3>

                    <h5> Popularity  <i class="fas fa-minus"></i>
<i class="fas fa-plus"></i>        
                    </h5>

                <div class="custom-control custom-radio">
                    <input   @click="key = 1" type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio1">Top</label>
                </div>

                    <div class="custom-control custom-radio">
                    <input   @click="key = 1" type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadio1">Un Top</label>
                    </div>

        <h5> Duration</h5>

            <div class="custom-control custom-radio">
                <input  @click="key = 2" type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Quick</label>
            </div>

                    <div class="custom-control custom-radio">
                <input  @click="key = 3" type="radio" id="customRadio3" name="customRadio" class="custom-control-input" checked>
                <label  class="custom-control-label" for="customRadio3">Long</label>
            </div>

        <h5> Categories </h5>

            <div class="custom-control custom-radio">
                <input   @click="key = 4" type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio4">Rock</label>
            </div>

                    <div class="custom-control custom-radio">
                <input  @click="key = 5" type="radio" id="customRadio5" name="customRadio" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio5">Chill</label>
            </div>

            <div class="custom-control custom-radio">
                <input  @click="key = 6" type="radio" id="customRadio6" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio6">Meditate</label>
            </div>


                    <div class="custom-control custom-radio">
                <input   @click="key = 7" type="radio" id="customRadio7" name="customRadio" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio7">Popular</label>
            </div>

     

   

                        <div class="custom-control custom-radio">
        <input  @click="key = 26" type="radio" id="customRadio26" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio26">Popular  </label>
      </div> 
      <div class="custom-control custom-radio">
        <input  @click="key = 8" type="radio" id="customRadio8" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio8">All</label>
      </div>
      -

            <div class="custom-control custom-radio">
            <input  @click="key = 9" type="radio" id="customRadio9" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio9">Ambiental</label>
        </div>

                <div class="custom-control custom-radio">
            <input  @click="key = 10" type="radio" id="customRadio10" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio10">Gaming</label>
        </div>


                <div class="custom-control custom-radio">
            <input   @click="key = 11" type="radio" id="customRadio11" name="customRadio" class="custom-control-input" checked>
            <label class="custom-control-label" for="customRadio11">Classic</label>
        </div>

        <div class="custom-control custom-radio">
            <input  @click="key = 12" type="radio" id="customRadio12" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio12">Lo-Fi</label>
        </div>

                <div class="custom-control custom-radio">
                <input  @click="key = 13" type="radio" id="customRadio13" name="customRadio" class="custom-control-input" checked>
                <label  class="custom-control-label" for="customRadio13">HipHop</label>
                </div>

            <div class="custom-control custom-radio">
                <input  @click="key = 24" type="radio" id="customRadio24" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio24">Techno  </label>
            </div>

                <div class="custom-control custom-radio">
        <input  @click="key = 25" type="radio" id="customRadio25" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio25">Trap  </label>
      </div>

      <h5> Countries / Regional </h5>

            <div class="custom-control custom-radio">
                <input   @click="key = 14" type="radio" id="customRadio14" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio14">African</label>
            </div>

                    <div class="custom-control custom-radio">
                <input  @click="key = 15" type="radio" id="customRadio15" name="customRadio" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadio15">Spania</label>
            </div>
                <div class="custom-control custom-radio">
                <input  @click="key = 22" type="radio" id="customRadio22" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio22">Spanish  </label>
            </div>

            <div class="custom-control custom-radio">
                <input  @click="key = 16" type="radio" id="customRadio16" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio16">China</label>
            </div>
                    <div class="custom-control custom-radio">
                <input  @click="key = 18" type="radio" id="customRadio18" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio18">Chinese</label>
            </div>


                    <div class="custom-control custom-radio">
                <input   @click="key = 17" type="radio" id="customRadio17" name="customRadio" class="custom-control-input" >
                <label class="custom-control-label" for="customRadio17">Arabic</label>
            </div>

                <div class="custom-control custom-radio">
                <input  @click="key = 19" type="radio" id="customRadio19" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio19">France </label>
            </div>

                    <div class="custom-control custom-radio">
                <input  @click="key = 20" type="radio" id="customRadio20" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio20">Indian </label>
            </div>

                        <div class="custom-control custom-radio">
                <input  @click="key = 21" type="radio" id="customRadio21" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio21">Italy </label>
            </div>


                        <div class="custom-control custom-radio">
                <input  @click="key = 23" type="radio" id="customRadio23" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio23">Japan  </label>
            </div>
                    </div>
 </div>
                    <div class="col-lg-10">
                <div class="container" v-if="key == 1" >

                    <h1>Top Category</h1>

                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in tops" key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a href="#category-link" class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                         
                <div class="container"  v-if="key == 2">
                    <h1>Quick Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in quick"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                              

                <div class="container" v-if="key == 3">
                    <h1>Long Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in long"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>


                <div class="container"  v-if="key == 4">
                    <h1>Rock Playlist</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in rock" :key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container" v-if="key == 5">
                    <h1>Chill Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in chill"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 6">
                    <h1>Meditate Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in meditat" :key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`" >
                                    <div>
                                        <a href="#category-link" class="category" >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 7">
                    <h1>Down Tempo Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in downtempo" :key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link  :to="`/playlists/${popularCategory.slug}`">
                                    <div>
                                        <a href="#category-link"class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 8">
                    <h1>All Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in all" :key="popularCategory.id" >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`" >
                                    <div>
                                        <a href="#category-link"  class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 9">
                    <h1>Ambiental Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in ambiental" :key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`">
                                    <div>
                                        <a href="#category-link"class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 10">
                    <h1>Gaming Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4"v-for="popularCategory in gaming":key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`">
                                    <div>
                                        <a href="#category-link" class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="container"  v-if="key == 11">
                    <h1>Classic Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in classic" :key="popularCategory.id">
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`">
                                    <div>
                                        <a  href="#category-link" class="category">
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 12">
                    <h1>Lo-Fi Category</h1>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4" v-for="popularCategory in lo_fi" :key="popularCategory.id" >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link :to="`/playlists/${popularCategory.slug}`" >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 13">
                    <h1>HipHop Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in hiphop"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 14">
                    <h1>African Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in african"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 15">
                    <h1>Spania Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in spania"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 16">
                    <h1>China Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in china"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 17">
                    <h1>Arabic Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in arabic"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 18">
                    <h1>Chinese Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in chinese"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 19">
                    <h1>France Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in france"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 20">
                    <h1>Indian Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in indian"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 21">
                    <h1>Italy Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in italy"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 22">
                    <h1>Spanish Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in spanish"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 23">
                    <h1>Japan Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in japan"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 24">
                    <h1>Techno Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in techno"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="container"  v-if="key == 25">
                    <h1>Trap Category</h1>
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in trap"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
       
                <div class="container"  v-if="key == 26">
                    <!-- <h1>Popular Category</h1> -->
                    <div class="row">
                        <div
                            class="col-lg-3 col-md-6 mb-4"
                            v-for="popularCategory in playlists"
                            :key="popularCategory.id"
                        >
                            <div class="category-card">
                                <img :src="popularCategory.image" />
                                <nuxt-link
                                    :to="`/playlists/${popularCategory.slug}`"
                                >
                                    <div>
                                        <a
                                            href="#category-link"
                                            class="category"
                                        >
                                            {{ popularCategory.name }}
                                        </a>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>                   
</div>
</div> 
</div>
</template>

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
        search,faGithub,fas
    },
    async asyncData({ $axios, params }) {
        let playlist = await $axios.$get(`/playlists`);
        let chann = await $axios.$get(`/channels`);

      
        return {
            visibleDivId : null,
         key: 26,
            isTop : true,
            isTock : true,
            isChill : true,
            isLong: true,
            isQuick: true,
            isMedidate: true,
            isDownTempo: true,
            isAmbiental: true,
            isGaming:true,
            isClassic: true,
            isLofi: true,
            isHipHop: true,
            isAfrican: true,
            isSpania:true,
            isChina: true,
            isArabil: true,
            isChinese: true,
            isFrance: true,
            isIndian: true,
            isItaly: true,
            isSpanish: true,
            isJapan: true,
            isTecno: true,
            isTrap:true,
            isPopular:true,
            playlists: playlist.playlists,
            tops: playlist.top,
            rock: playlist.rock,
            chill: playlist.chill,
            long: playlist.long,
            quick: playlist.quick,
            meditat: playlist.meditat,
            downtempo: playlist.downtempo,
            all: playlist.all,
            ambiental: playlist.ambiental,
            gaming: playlist.gaming,
            classic: playlist.classic,
            lo_fi: playlist.lo_fi,
            hiphop: playlist.hiphop,
            african: playlist.african,
            spania: playlist.spania,
            china: playlist.china,
            arabic: playlist.arabic,
            chinese: playlist.chinese,
            france: playlist.france,
            indian: playlist.indian,
            italy: playlist.italy,
            spanish: playlist.spanish,
            japan: playlist.japan,
            techno: playlist.techno,
            trap: playlist.trap,
            channels: chann.data
        };
    },
    methods: {
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle("shown");
        }
    }
};
</script>

<style scoped>
.c {
    padding-left: 3%;
    padding-top: 50px;
    background: url("~assets/background.png");
    height: 5000px;
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}

.leftBar {
    background-color: #090909;
    position: fixed;
    margin-right: 100px;
    /* margin-top: 120px; */
    height: 100%;
    color: #8422a6;
    border-top-right-radius: 50px;
    opacity: 0.8;
    height: 100%;
    /* width: 160px; */
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    /* background-color: #111; */
    overflow-x: hidden;
    padding-top: 140px;
    padding-bottom: 20px;
    width: 300px;
}
h3,
a {
    color: #f58aff;
}

h3 {
        font-size: 1.25rem;
        border-bottom: 2px solid #2ecc71;
            padding-bottom: 1rem;

}


label.btn span {
  font-size: 1.5em ;
}

label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-dot-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 2em;
text-align: left;
white-space: nowrap;
vertical-align: top;
cursor: pointer;
background-color: none;
border: 0px solid 
#c8c8c8;
border-radius: 3px;
color: #c8c8c8;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}

div[data-toggle="buttons"] label:hover {
color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
-webkit-box-shadow: none;
box-shadow: none;
}


/*  submenu logic */
.dropdown-submenu {
  position: relative;
}
.dropdown-submenu > .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
}
.dropdown-submenu:hover > .dropdown-menu {
  display: block;
}
.dropdown-submenu:hover > a:after {
  border-left-color: #fff;
}
.dropdown-submenu.pull-left {
  float: none;
}
.dropdown-submenu.pull-left > .dropdown-menu {
  left: -100%;
  margin-left: 10px;
}


</style>
