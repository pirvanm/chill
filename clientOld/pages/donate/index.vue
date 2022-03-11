<template>


    <div>

        <div>
            <p class="wellcome-donation">
                I wanna make this project big, but this take some resource so any suggestion, any $ can help! Chill Whisper is for us not for me, so let do it together!
        </p>

        </div>
    <div role="tablist">

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-1 variant="info">How 5$ help</b-button>
            </b-card-header>
            <b-collapse id="accordion-1"  accordion="my-accordion" role="tabpanel">
                <b-card-body>

                    <b-card-text>
                        <p> 5$ it is basically monthly cost for hosting, even better a coffer pack for me, or 2-3 coffer in Starbuck.</p>
                        <p> For 5$ I will take a short task, about to improve chill whisper(i use trello)</p>
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
                        <p> 10$, It basically the annual price for the domain, maybe price for a logo(I'm not web designer), just web developer.</p>
                        <p> You can suggest me 2 small tasks for chill whisper</p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info">How 20$ help<</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <p> Basically I can't  buy a service or something specific, but I can buy hosting for many months,
                            more coffee, even a pizza when i coding with love for chill whisper
                        </p>


                        <p>
                            Everyone who makes a donation by 20$, I will give him contributor role,
                            he can post a video for all users without approving status(just if are according by site niche, chill music)
                        </p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>

        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info">How 50$ help<</b-button>
            </b-card-header>
            <b-collapse id="accordion-4" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text>
                        <p> To be honest chill whisper it is something made for use, I don't have a specific client how to pay for this, just I pay with my time
                            and my dream, 90% I code alone so a part of donations will go to a friend to help me with developing, faster. </p>
                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>


        <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
                <b-button block href="#" v-b-toggle.accordion-3 variant="info">How 100$ help<</b-button>
            </b-card-header>
            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                <b-card-body>
                    <b-card-text><p> Chill Whisper it is a progression, in one day I hope this will become a social network for everyone who loves chill music
                        , so basically this sum will be used to developing a full module like :</p>
                        <ul>
                            <li>Directory App</li>
                            <li>Music App </li>
                            <li>Social App </li>


                        </ul>
                        <p> Each Module(App) have different functionality, so for :</p>

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
                            <li></li>
                        </ul>

                        <p> For everyone who makes this donation, I will give in private 4 sessions(2 h each) about programming, it in general</p>



                    </b-card-text>
                </b-card-body>
            </b-collapse>
        </b-card>
    </div>
        <div>
            <h1 class="thanks-title"> EveryOne who make a donation will recive from me a warm thanks and exchange gift !</h1>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="24FZ3CZRVDRYJ" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_RO/i/scr/pixel.gif" width="1" height="1" />
            </form>
        </div>

        <div class="hosting">This site project it is hoster by cloudify.ro

            if you brough hosting from this link <a href="https://cloudify.ro/?cfy=5d84ad8c22c411000191046c">link </a> you contribute directly to suport of sites!


        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                text: `
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
          richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
          brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
          tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
          assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
          wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
          vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
          synth nesciunt you probably haven't heard of them accusamus labore VHS.
        `
            }
        }
    }
</script>

<style>

.hosting {
    text-align: center;
    font-size: 17px;
    margin-top: 20px;
}



    .wellcome-donation {
        font-size: 15px;
        margin-top: 45px;
        margin-bottom: 45px;
        /* margin-left: 28px; */
        text-align: center;
    }


    .thanks-title{

    text-align: center;
    margin-top: 40px;
    font-size: 20px;
    margin-bottom: 30px;}
</style>