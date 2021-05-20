<template>
    <div>
        <ul>
            <li>
                <nuxt-link to="/" class=""> Home </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/videos" class=""> Videos </nuxt-link>
            </li>
            <li>
                <nuxt-link to href="/playlists" class=""> Playlists </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/suggest" class="">Add a video </nuxt-link>
            </li>

            <li>
                <nuxt-link to="/history" class="">History </nuxt-link>
            </li>
            <li>
                <a to="/contact" class=""> Contact </a>
            </li>
        </ul>

        <!--    <h2>Playlists</h2>-->
        <!--    <ul>-->
        <!--      <li>-->
        <!--        <a href="/playlists/4" class=""> Chillout </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/3" class=""> ChillHop </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/3" class=""> Ambiental </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/6" class=""> Chillstep </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/7" class=""> Classic </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/8" class=""> Classical </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/9" class=""> Downtempo </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/10" class=""> Lofi </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/13" class=""> Lounge </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/14" class=""> Regional </a>-->
        <!--      </li>-->
        <!--      <li>-->
        <!--        <a href="/playlists/19" class=""> Techno </a>-->
        <!--      </li>-->
        <!--      <li><a href="/playlists/20" class=""> Trap</a></li>-->
        <!--    </ul>-->

        <!--    <h2><a href="/videos/all" class=""> Videos</a></h2>-->
        <!--    <ul>-->
        <!--      <li><a href="/videos/chillout" class=""> Chillout</a></li>-->
        <!--      <li><a href="/videos/chillhop" class=""> ChillHop</a></li>-->
        <!--      <li><a href="/videos/ambiental" class=""> Ambiental</a></li>-->
        <!--      <li><a href="/videos/chillstep" class=""> Chillstep</a></li>-->
        <!--      <li><a href="/videos/classic" class="">Classic </a></li>-->
        <!--      <li><a href="/videos/classical" class=""> Classical</a>Classical</li>-->
        <!--      <li><a href="/videos/downtempo" class=""> Downtempo</a>Downtempo</li>-->

        <!--      <li>-->
        <!--        <ul>-->
        <!--          <h2>-->
        <!--            <a href="/videos/lofi" class=""> Lofi</a>-->
        <!--          </h2>-->

        <!--          <li><a href="/videos/lofi-hiphop" class=""> Hip Hop</a></li>-->
        <!--          <li><a href="/videos/lofi-house" class=""> House</a></li>-->
        <!--        </ul>-->
        <!--      </li>-->

        <!--      <li><a href="/videos/Lounge" class="">Lounge </a></li>-->
        <!--      <li>-->
        <!--        <ul>-->
        <!--          <h1>-->
        <!--            <a href="/videos/regional" class="">Regional </a>-->
        <!--          </h1>-->
        <!--          <li>-->
        <!--            <a href="/videos/regional-african" class="">African </a>-->
        <!--          </li>-->
        <!--          <li><a href="/videos/regional-arabic" class="">Arabic </a></li>-->
        <!--          <li>-->
        <!--            <a href="/videos/regional-chinese" class="">Chinese </a>-->
        <!--          </li>-->
        <!--          <li><a href="/videos/regional-france" class="">France </a></li>-->
        <!--          <li><a href="/videos/regional-indian" class="">Indian </a></li>-->
        <!--          <li><a href="/videos/regional-italy" class="">Italy </a></li>-->
        <!--          <li><a href="/videos/regional-japan" class="">Japan </a></li>-->
        <!--          <li><a href="/videos/regional-spanish" class="">Spanish </a></li>-->
        <!--        </ul>-->
        <!--      </li>-->
        <!--      <li><a href="/videos/Techno" class="">Techno </a></li>-->
        <!--      <li><a href="/videos/Trap" class="">Trap </a></li>-->
        <!--    </ul>-->

        <div class="footer">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style scoped>
ul {
    /* background-color: red; */
}

h2 {
    font-size: 1.5em;
    padding: 10px 0 10px 0;
}

.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;

    color: white;
    text-align: center;
}

.footer ul li {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
}
li a {
    color: #8422a6;
}
.leftBar {
    background-color: #090909;
    position: fixed;
    margin-right: 100px;
    margin-top: 120px;
    height: 100%;
    color: #8422a6;
    border-top-right-radius: 50px;
    opacity: 0.8;
    width: 100%;
}
</style>
