<template>
  <div>
    <ul>
      <i class="fas fa-bars"></i>
      <li>Home</li>
      <li>All Videos</li>
      <li>All Playlists</li>
      <li>Add a Video!</li>
    </ul>

    <h2>Playlists</h2>
    <ul>
      <li>Chillout</li>
      <li>ChillHop</li>
      <li>Ambiental</li>
      <li>Chillstep</li>
      <li>Classic</li>
      <li>Classical</li>
      <li>Downtempo</li>
      <li>Lofi</li>
      <li>Lounge</li>
      <li>Regional</li>
      <li>Techno</li>
      <li>Trap</li>
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
</style>