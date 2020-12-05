<template>
  <div>
    <ul>
      <i class="fas fa-bars"></i>
      <li>
        <a href="/" class=""> Home </a>
      </li>
      <li>
        <a href="/videos/all" class=""> All Videos </a>
      </li>
      <li>
        <a href="/playlists" class="">All Playlists </a>
      </li>
      <a href="/suggest" class="">Add a video </a>
    </ul>

    <h2>Playlists</h2>
    <ul>
      <li>
        <a href="/playlists/4" class=""> Chillout </a>
      </li>
      <li>
        <a href="/playlists/3" class=""> ChillHop </a>
      </li>
      <li>
        <a href="/playlists/3" class=""> Ambiental </a>
      </li>
      <li>
        <a href="/playlists/6" class=""> Chillstep </a>
      </li>
      <li>
        <a href="/playlists/7" class=""> Classic </a>
      </li>
      <li>
        <a href="/playlists/8" class=""> Classical </a>
      </li>
      <li>
        <a href="/playlists/9" class=""> Downtempo </a>
      </li>
      <li>
        <a href="/playlists/10" class=""> Lofi </a>
      </li>
      <li>
        <a href="/playlists/13" class=""> Lounge </a>
      </li>
      <li>
        <a href="/playlists/14" class=""> Regional </a>
      </li>
      <li>
        <a href="/playlists/19" class=""> Techno </a>
      </li>
      <li><a href="/playlists/20" class=""> Trap</a></li>
    </ul>

    <h2>Videos</h2>
    <ul>
      <li>Chillout</li>
      <li>ChillHop</li>
      <li>Ambiental</li>
      <li>Chillstep</li>
      <li>Classic</li>
      <li>Classical</li>
      <li>Downtempo</li>

      <li>
        <ul>
          <h2>Lofi</h2>

          <li>Hip Hop</li>
          <li>House</li>
        </ul>
      </li>

      <li>Lounge</li>
      <li>
        <ul>
          <h1>Regional</h1>
          <li>African</li>
          <li>Arabic</li>
          <li>Chinese</li>
          <li>France</li>
          <li>Indian</li>
          <li>Italy</li>
          <li>Japan</li>
          <li>Spanish</li>
        </ul>
      </li>
      <li>Techno</li>
      <li>Trap</li>
    </ul>

    <div class="footer">
      <ul>
        <li>111</li>
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
</style>