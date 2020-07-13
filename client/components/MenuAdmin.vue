<template>
    <div>



        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-brand href="/">Chill Whisper </b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item href="/videos">Videos</b-nav-item>
                    <b-nav-item href="/channels" >Channels</b-nav-item>
                    <!-- <b-nav-item href="/suggest" >Emails Video</b-nav-item>-->
                    <b-nav-item href="/donate" >Suport Us</b-nav-item>
                    <b-nav-item   href="/contact" disable >Contact</b-nav-item>

                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto rigth-link">
                    <b-nav-item href="#">Login</b-nav-item>
                    <b-nav-item href="#">Register</b-nav-item>

                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
    export default {
        name: 'MenuAdmin',
    }
</script>