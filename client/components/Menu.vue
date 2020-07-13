<template>
  <!--  <client-only>
        <b-navbar toggleable="md" type="info" variant="white">
            <b-navbar-brand>
                <nuxt-link to="/">Chill Whisper</nuxt-link>
            </b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-list-group>
                        <b-card no-body class="mb-1">
                            <b-card-header header-tag="header" class="p-1" role="tab">
                                <b-button block href="#" v-b-toggle.accordion-1 variant="info">Videos</b-button>
                            </b-card-header>
                            <b-collapse id="accordion-1"
                                        accordion="my-accordion"
                                        role="tabpanel">
                                <b-card-body>

                                    <b-text>
                                        <b-list-group class="menu">
                                            <b-list-group-item active>
                                                <b-nav-item href="/videos/all">All Videos</b-nav-item>
                                            </b-list-group-item>
                                            <b-list-group-item >
                                                <b-nav-item href="/videos/ambiental">Ambiental</b-nav-item>
                                            </b-list-group-item>
                                            <b-list-group-item>
                                                <b-nav-item href="/videos/regional">Regional</b-nav-item>
                                            </b-list-group-item>
                                            <b-list-group-item>
                                                <b-nav-item href="/videos/lofi">Lofi</b-nav-item>
                                            </b-list-group-item>
                                            <b-list-group-item>
                                                <b-nav-item href="/videos/chillout">Chill Out</b-nav-item>
                                            </b-list-group-item>
                                            <b-list-group-item>
                                                <b-nav-item href="/videos/chillstep">Chill Step</b-nav-item>
                                                </b-list-group-item>
                                            <b-list-group-item>
                                                <b-nav-item href="/videos/chillhop">Chill Hop</b-nav-item>
                                                </b-list-group-item>
                                        </b-list-group>
                                    </b-text>
                                </b-card-body>
                            </b-collapse>
                        </b-card>
                    </b-list-group>

                    <b-nav-item>
                        <b-nav-item href="/channels">Channels</b-nav-item>
                    </b-nav-item>
                    &lt;!&ndash; <b-nav-item href="/suggest" >Emails Video</b-nav-item>&ndash;&gt;
                    <b-nav-item>
                        <b-nav-item href="/donate">Support Us</b-nav-item>
                    </b-nav-item>
                    <b-nav-item>
                        <b-nav-item href="/contact">Contact</b-nav-item>
                    </b-nav-item>
                </b-navbar-nav>

                &lt;!&ndash; Right aligned nav items &ndash;&gt;
        &lt;!&ndash;        <b-navbar-nav class="ml-auto rigth-link" v-if="!$auth.loggedIn">
                    <b-nav-item>
                        <nuxt-link to="/login">
                            <i class="fas fa-user-tie"></i> Login</nuxt-link
                        >
                    </b-nav-item>
                    <b-nav-item>
                        <nuxt-link to="/register"
                            ><i class="fas fa-user-tie"></i> Register</nuxt-link
                        >
                    </b-nav-item>
                </b-navbar-nav>&ndash;&gt;
&lt;!&ndash;                <b-navbar-nav class="ml-auto rigth-link" v-else>
                    <b-nav-item>{{ this.$auth.user.name }}</b-nav-item>
                    <b-nav-item>{{ this.$auth.user.email }}</b-nav-item>
                </b-navbar-nav>&ndash;&gt;
            </b-collapse>
        </b-navbar>
    </client-only>-->
</template>

<script>
export default {
    name: "MenuBar"
};
</script>

<style>
    .list-group .list-group-item:nth-child(2)
    {
        background: red;
        color:green;
        display:none;
    }


    .list-group .list-group-item:nth-child(2)
    {
        display:none
    }

    .list-group .list-group-item:nth-child(1):hover +.list-group .list-group-item:nth-child(2):hover {
        background: yellow;
        display:block;
    }
    .card#accordion-1{
        color:red;
        background-color:purple;
        min-height: 2px!important;
        height: 3px!important;
    }
    .card.mb-1
    {
        min-height: 2px!important;
        height: 3px!important;
    }
</style>
