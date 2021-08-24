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
                <h1>Write A message for us </h1>
                <div class="container">
                    <!--Section: Contact v.2-->
                    <section class="mb-4">

                        <!--Section heading-->
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                            a matter of hours to help you.</p>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" action="/api/contactUSPost" method="POST">

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="name" name="name" class="form-control">
                                                <label for="name" class="mt-3 mb-3">Your name</label>
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="email" name="email" class="form-control">
                                                <label for="email" class="mt-3 mb-3">Your email</label>
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="subject" name="subject" class="form-control">
                                                <label for="subject" class="mt-3 mb-3">Subject</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                            <div class="md-form">
                                                <textarea type="text" id="message" name="user_message" rows="2"
                                                          class="form-control md-textarea"></textarea>
                                                <label for="message">Your message</label>
                                            </div>

                                        </div>
                                    </div>
                                    <!--Grid row-->

                                </form>

                                <div class="text-center text-md-left">
                                    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                                </div>
                                <div class="status"></div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-center">
                                <ul class="list-unstyled mb-0">
<!--                                    <li><i class="fas fa-map-marker-alt fa-2x"></i>-->
<!--                                        <p>San Francisco, CA 94126, USA</p>-->
<!--                                    </li>-->



                                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                        <p>whisperchill4@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
export default {
    components: {
        newLeftBar,
        newFooter,
        search
    },

    head: {
        title: "Chillwhispers ",
        meta: [
            {
                hid: "description",
                name: "description",
                content: "Chillwhispers Home Page"
            },
            {
                hid: "keywords",
                name: "keywords",
                content: "chillwhispers, video, calm music, music, music video,"
            },
            {
                hid: "og:title",
                name: "og:title",
                content: "Chillwhispers music videos"
            },
            {
                hid: "og:type",
                name: "og:type",
                content: "music"
            },
            {
                hid: "og:url",
                name: "og:url",
                content: "https://chillwhispers.com"
            },
            {
                hid: "og:image",
                name: "og:image",
                content: "https://i.ytimg.com/vi/n0svuurLibQ/mqdefault.jpg"
            },
            {
                hid: "og:site_name",
                name: "og:site_name",
                content: "chillwhispers"
            },
            {
                hid: "og:description",
                name: "og:description",
                content: "Chillwhispers Home Page"
            }
        ]
    },
    // mounted() {
    //     document.addEventListener("keydown", this.move);
    // },

    // beforeDestroy() {
    //     document.removeEventListener("keydown", this.move);
    // },

    methods: {
        toggleSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.classList.toggle('shown')
        },
        move(e) {
            if (e.keyCode === 48) {
                window.location.href = "https://chillwhispers.com/playlists/1";
                //return;
            }

            if (e.keyCode === 49) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/3";
                //return;
            }

            if (e.keyCode === 50) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/4";
                //return;
            }

            if (e.keyCode === 51) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/6";
                //return;
            }

            if (e.keyCode === 52) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/7";
                //return;
            }

            if (e.keyCode === 53) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/8";
                //return;
            }

            if (e.keyCode === 54) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/9";
                //return;
            }

            if (e.keyCode === 55) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/10";
                //return;
            }

            if (e.keyCode === 56) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/13";
                //return;
            }

            if (e.keyCode === 57) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/14";
                //return;
            }

            if (e.keyCode === 17) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/19";
                //return;
            }

            if (e.keyCode === 84) {
                console.log("stopp");
                window.location.href = "https://chillwhispers.com/playlists/20";
                //return;
            }

            e.preventDefault();
        }
    }
};
</script>

<style scoped>

p {
    color:white;
}
label {
    color:#f58aff;
}
/*# sourceMappingURL=style.css.map */
</style>
