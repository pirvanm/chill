<template>
<div class="col-md-2">
<b-button v-b-toggle.sidebar-1> 
<i class="fas fa-bars"></i>

</b-button>
<b-button class="logo main-logo">Chill Whispers </b-button>
     <b-sidebar id="sidebar-1"  shadow>
      <div class="px-3 py-2">
        <a href="/" css="logo">
                    <i class="fas fa-headphones"></i>
                    <span class="logo ">Chill Whispers</span>
                </a>
                <ul class="list-home">
                    <li>
                        <i class="fas fa-home"></i> Home
                    </li>
                </ul>

                <ul class="list-videos">
                    <li>
                        <a href="/videos">
                            <i class="fa fa-music"></i> Latest Videos
                        </a>
                    </li>

                    <li>
                        <a href="/videos/ambiental">Ambiental Videos</a>
                    </li>
                    <li>
                        <a href="/videos/chillhop">ChillHop Videos</a>
                    </li>
                    <li>
                        <a href="/videos/chillout">ChillOut Videos</a>
                    </li>

                    <li>
                        <a href="/videos/chillstep">Chillstep Videos</a>
                    </li>

                    <li>
                        <a href="/videos/classic">Classic Videos</a>
                    </li>
                    <li>
                        <a href="/videos/classical">Classical Videos</a>
                    </li>
                    <li>
                        <a href="/videos/downtempo">Downtempo Videos</a>
                    </li>
                    <li>
                        <a href="/videos/lofi">Lofi Videos</a>
                    </li>
                    <li>
                        <a href="/videos/lounge">Lounge Videos</a>
                    </li>

                    <li>
                        <a href="/videos/regional">Regional Videos</a>
                    </li>

                    <li>
                        <a href="/videos/trap">Trap Videos</a>
                    </li>

                    <li>
                        <a href="/videos/world">World Videos</a>
                    </li>
                </ul>

                <ul class="list-helpfull">
                    <li>HelpFull</li>

                    <li>Contact</li>
                    <li>Suport</li>
                    <li>Suggestion</li>
                </ul>

                <ul class="social-list">
                    <h1>Follow Us!</h1>
                    <li>
                        <a href="https://twitter.com/chill_whisper">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Chill-Whisper-317341858891377/?modal=admin_todo_tour">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </li>
                </ul>
      </div>
    </b-sidebar>
    </div>
</template>