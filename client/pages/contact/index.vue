<template>
 <div>

  <b-form @submit="onSubmit" @reset="onReset" v-if="show">
   <b-form-group
           id="input-group-1"
           label="Email address:"
           label-for="input-1"
           description="We'll never share your email with anyone else."
   >
    <b-form-input
            id="input-1"
            v-model="form.email"
            type="email"
            required
            placeholder="Enter email"
    ></b-form-input>
   </b-form-group>

   <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
    <b-form-input
            id="input-2"
            v-model="form.name"
            required
            placeholder="Enter name"
    ></b-form-input>
   </b-form-group>

   <b-form-group id="input-group-3" label="Topic:"
                 label-for="input-3">
    <b-form-select
            id="input-3"
            v-model="form.food"
            :options="foods"
            required
    ></b-form-select>


    <b-form-group id="input-group-2" label="Your Message:" label-for="input-2">
     <b-form-textarea
             id="input-2"
             v-model="form.message"
             required
             placeholder="Enter the message"
     ></b-form-textarea>
    </b-form-group>
   </b-form-group>



   <b-button type="submit" variant="primary">Submit</b-button>
   <b-button type="reset" variant="danger">Reset</b-button>


   <p> Or Just send me a email to : whisperchill4@gmail.com</p>
  </b-form>
<!--  <b-card class="mt-3" header="Info">
   Each opinion matters, which is why we invite you to leave us an email at the following address : contact@chillwhisper.com
 &lt;!&ndash;  <pre class="m-0">{{ form }}</pre>&ndash;&gt;
  </b-card>-->
 </div>
</template>

<template>
<div class="body">
<div class="main">
    <div class="heading">


        <!--            <button type="submit" v-on:click=toggleSidebar()>-->
        <!--                <i class="fa fa-bars"></i>Menu</button>-->

        <button type="submit" v-on:click=toggleSidebar()>
            <i class="fas fa-bars">Menu</i></button>
        <span class="title">Chillwhispers</span>
    </div>

    <newLeftBar />
    <div class="content">
        <div>
            <search />
        </div>

        <div class="clearfix"></div>
        <h1>Popular songs</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/_bpS-cOBK6Q"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/eulJvgsAZao/mqdefault.jpg"/>
                            <p class="title">
                                Booker T & the M G 's - Green Onions (Original / HQ audio)
                            </p>

                        </nuxt-link>
                        <a href="#" class="category">Rock</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/PQQHuUGiOG8"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">
                                Best of Trip Hop & Downtempo & Lofi & Hip Hop Instrumental Vol  3 Re Upload
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Downtempo</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/neV3EPgvZ3g"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/neV3EPgvZ3g/mqdefault.jpg"/>
                            <p class="title">
                                Relaxing Jazz Music - Background Chill Out  Music - Music For Relax,Study,Work
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">ChillHop</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/zOvsyamoEDg"
                            class="text-dark">
                            <img src="https://i.ytimg.com/vi/zOvsyamoEDg/mqdefault.jpg"/>
                            <p class="title">
                                FAUN - Federkleid (Offizielles Video)
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Regional</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/yEbrvMljMCg"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/yEbrvMljMCg/mqdefault.jpg"/>
                            <p class="title">
                                Deborah de Luca @ Château de Chambord in France for Cercle
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Tehno</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/2atQnvunGCo"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/2atQnvunGCo/mqdefault_live.jpg"/>
                            <p class="title">
                                Shiloh - lofi hip hop mix [LIVE 24/7] Shiloh Dynasty
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Lo-Fi</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/98I_ST9GZSE"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/98I_ST9GZSE/mqdefault.jpg"/>
                            <p class="title">
                                Beautiful IBIZA Beach Lounge Del Mar
                                Chillout Mix
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Lounge</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/fWRISvgAygU"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/fWRISvgAygU/mqdefault.jpg"/>
                            <p class="title">
                                Epic Chillstep Collection 2015 [2 Hours]
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Chillstep</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/jUoGYrWZXLs"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/jUoGYrWZXLs/mqdefault.jpg"/>
                            <p class="title">
                                Doja Cat - Trauma
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Clasic Pop</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/7JmprpRIsEY"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/7JmprpRIsEY/mqdefault.jpg"/>
                            <p class="title">
                                Classical Music for Brain Power -
                                Mozartx
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Classical</a>
                    </div>
                </div>

                <!--                    <div class="col-lg-4 col-md-6 mb-4">-->
                <!--                        <div class="video-card">-->
                <!--                            <nuxt-link-->
                <!--                                to="/watch/jpv2tMJJuz0"-->
                <!--                                class="text-dark"-->
                <!--                            >-->
                <!--                                <img src="https://i.ytimg.com/vi/jpv2tMJJuz0/mqdefault.jpg"/>-->
                <!--                                <p class="title">-->
                <!--                                    EHRLING - Nu Lounge Bar Music 2017-->
                <!--                                </p>-->
                <!--                            </nuxt-link>-->
                <!--                            <a href="#" class="category">Classical</a>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/hvkZWhpzmWs"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/hvkZWhpzmWs/mqdefault.jpg"/>
                            <p class="title">
                                Italian Dinner - Background Music,
                                Italian Music, Folk Music from Italy
                                (Carosone, Modugno...)
                            </p>
                        </nuxt-link>
                        <a href="#" class="category">Regioanal </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/K9WiYD8zCA8"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/K9WiYD8zCA8/mqdefault.jpg"/>
                            <p class="title">
                                Trap Music ♫ Chill & Happy Trap Mix
                                ♫ Gaming Music
                            </p>
                        </nuxt-link>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="video-card">
                        <nuxt-link
                            to="/watch/hDzgYiiuR30"
                            class="text-dark"
                        >
                            <img src="https://i.ytimg.com/vi/hDzgYiiuR30/mqdefault.jpg"/>
                            <p class="title">
                                Wonderfull Chill Out Music Love
                                Session on Amazing
                            </p>
                        </nuxt-link>
                    </div>
                </div>







            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>

import newLeftBar from "@/components/newLeftBar";
    export default {
            components: {
                newLeftBar,
            },
        data() {
            return {
                form: {
                    email: '',
                    name: '',
                    food: null,
                    checked: []
                },
                foods: [{ text: 'Select One', value: null }, 'Colaboration', 'Free Talk', 'Bugg'],
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.name = ''
                this.form.food = null
                this.form.checked = []
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
            })
            }
        }
    }
</script>
