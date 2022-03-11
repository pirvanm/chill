<template>
    <div role="tablist">

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-1 variant="">How 5$ help</b-button>
            </b-card-header>
            <b-collapse id="accordion-1"  accordion="my-accordion" role="tabpanel">
                <b-card-body>

                    <b-card-text>
                        <p> 5$ it is basicaly mountly cost for hosting, even better a coffer pack for me, or 2-3 coffer in starbuck.</p>
                        <p> For 5$ i will take a short task , about to improve chillwhisper(i use trello)</p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-2 variant="info">How 10$ help</b-button>
            </b-card-header>
            <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <p> 10$  , It basicaly anual price for  anually domain, maybe price for a logo(i'm not web designer), just web developer.</p>
                        <p> You can suggest me 2 small task for chill whisper</p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info">How 20$ help</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <p> Basicaly i can't  buy a service or someting specific , but i can buy hosting for many mounths,
                            more coffe, even a pizza when i coding with love for chillwhisper
                        </p>


                        <p>
                            For Everyone who make  a donation by 20$, i will give him contribuitor role,
                            him can post video for all users without aproving status(just if are according by site niche,chill music)
                        </p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info">How 50$ help</b-button>
            </b-card-header>
            <b-collapse id="accordion-4" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <p> To be honest chillwhisper it is someting made for use, i don't have a specific client how pay for this, just i pay with my time
                            and my dream, 90% i code alone so a part of donations will go to a friends to help me with developing, faster. </p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>


        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info"> How 100$ help ?</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text><p> Chill Whisper it is progression,in one day i hope this will become a social network for everyone who love chill music
                        , so basicaly this sum will used to developing a full module like :</p>
                        <ul>
                            <li>Directory App</li>
                            <li>Music App </li>
                            <li>Social App </li>

                        </ul>
                        <p> Each Module(App) have different functionality,so for :</p>

                        <ul>
                            <h6>Directory App</h6>
                            <li>Suggest Channel</li>
                            <li>Suggest Song/Video</li>
                            <li>Share Button</li>
                            <li>Invite Friend via (email)</li>
                            <li>Mobile App</li>
                            <li>Channels Page</li>
                            <li>Video Page</li>
                        </ul>

                        <ul>
                            <h6> Music App</h6>
                            <li>User Playlist</li>
                            <li>Top Songs</li>
                            <li>Top Channels</li>
                            <li>Listen on Repeat</li>
                        </ul>

                        <ul>
                            <h6>Social App</h6>
                            <li>Chat Module</li>
                            <li>Friends Module</li>
                            <li>User Profile</li>
                            <li>Friends Song</li>
                            <li>Wall Module</li>

                        </ul>

                        <p> For eveyone who make this donation , i will give in private 4 sessions(2 h each) about programming, it in general</p>

                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                text: `
        `
            }
        }
    }
</script>

<style>
    ul.nav a
    {
        font-size:15px;
        margin-top: 20px;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .card {
        margin-bottom: 50px;
        min-height: 200px;
        height: 365px;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }
    .video-grid{
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 2%;
    }

    .bg-info {
        padding-left: 10%;
        background-color: #0000ff!important;
        opacity: 0.7;
        background-color: #0000ff!important;


    }

    .bg-image{

        background: url("~assets/pa.png");
        height:400px;
    }

    .navbar-dark .navbar-brand {
        color: #fd5e53;
    }

    .rigth-link{
        margin-right: 40px;
    }
</style>