<template>
  <div class="body">
    <div class="main">
      <div class="heading">
        <button type="submit" v-on:click="toggleSidebar()">
          <i class="fas fa-bars"></i>
        </button>
        <span class="title">Chillwhispers</span>
      </div>
      <newLeftBar />
      <div class="content">
        <div>
          <search />
        </div>
        <div class="clearfix"></div>
        <div class="container">
          <div class="row">
            <div
              class="col-lg-3 col-md-6 mb-4"
              v-for="category in categories"
              :key="category.id"
            >
              <div class="category-card">
                <img
                  :src="
                    category.background
                      ? category.background
                      : `/category/ambient.jpg`
                  "
                />
                <div>
                  <a href="#" class="category">{{ category.category_name }} </a>
                  <div class="cat-buttons">
                    <nuxt-link
                      :to="
                        category.playlist
                          ? `/playlists/${category.playlist}`
                          : `/playlists`
                      "
                      class="start"
                    >
                      <i class="fa fa-play" aria-hidden="true"></i>
                    </nuxt-link>

                    <nuxt-link
                      :to="`/videos/${category.category_name}`"
                      class="list"
                    >
                      <i class="fa fa-indent" aria-hidden="true"></i>
                    </nuxt-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import newFooter from "@/components/newFooter";
import newLeftBar from "@/components/newLeftBar";
import search from "@/components/Search";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { faGithub } from "@fortawesome/free-brands-svg-icons";
export default {
  components: {
    newLeftBar,
    newFooter,
    search,
  },
  async asyncData({ $axios, params }) {
    let { data } = await $axios.$get(`/categories`);
    return { categories: data };
  },
  methods: {
    toggleSidebar() {
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("shown");
    },
  },
};
</script>

<style scoped>
.amb {
  background: url("~assets/category/ambient.jpg");
}
.med {
  background: url("~assets/category/meditation.jpg");
}
.hop {
  background: url("~assets/category/chillhop.jpg");
}
.out {
  background: url("~assets/category/chillout.jpg");
}
.game {
  background: url("~assets/category/gaming.jpg");
}
.step {
  background: url("~assets/category/step.jpg");
}
.Classic {
  background: url("~assets/category/Classic.jpeg");
}
.babe {
  background: url("~assets/category/babe.jpg");
}
.down {
  background: url("~assets/category/down.jpeg");
}

.lofih {
  background: url("~assets/category/lo-fi.jpeg");
}

.lo-hi {
  background: url("~assets/category/lo-hi.jpeg");
}
.lo-ho {
  background: url("~assets/category/lo-ho.jpeg");
}

.regional-r {
  background: url("~assets/category/regional.jpg");
}
.africa {
  background: url("~assets/category/africa.jpg");
}

.china {
  background: url("~assets/category/china.jpeg");
}

.france {
  background: url("~assets/category/france.jpeg");
}
.india {
  background: url("~assets/category/indian.jpeg");
}
.italy {
  background: url("~assets/category/italy.jpg");
}

.japan {
  background: url("~assets/category/japan.jpeg");
}

.spain {
  background: url("~assets/category/spain.jpg");
}

.lounges {
  background: url("~assets/category/lounge.jpeg");
}

.tec {
  background: url("~assets/category/tec.jpeg");
}

.w {
  background: url("~assets/category/w.jpeg");
}
.traps {
  background: url("~assets/category/trap.jpeg");
}

.arabia {
  background: url("~assets/category/arabia.jpg");
}

.rock {
  background: url("~assets/category/rock.jpeg");
}

body {
  background: #0f2027;
  background: -webkit-linear-gradient(to right, #2c5364, #203a43, #0f2027);
  background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
}

.main {
  margin: auto;
  width: 100%;
  max-width: 1400px;
  display: flex;
  flex-direction: row;
}
.main .heading {
  display: none;
}
@media (max-width: 768px) {
  .main {
    display: block;
  }
  .main .heading {
    display: flex;
    justify-content: space-between;
    padding: 20px;
  }
  .main .heading .title {
    font-size: 20px;
    color: #f58aff;
    letter-spacing: 0.5px;
  }
  .main .heading button {
    padding: 0 10px;
    background: transparent;
    color: #fff;
    font-size: 28px;
    line-height: 20px;
    border: none;
    cursor: pointer;
  }
  .main .heading button i:before {
    font-family: "FontAwesome";
  }
}

h1 {
  margin: 15px 0;
  color: #eee;
  text-shadow: 1px 0px 3px #f58aff;
}

h2 {
  color: #eee;
  text-shadow: 1px 0px 3px #f58aff;
}

.breadcrumbs {
  margin: 25px 0 -15px;
  color: #eee;
}
.breadcrumbs a {
  color: #d303fc;
  text-decoration: none;
}
.breadcrumbs a:hover {
  font-weight: 600;
}

.sidebar {
  width: 160px;
  transition: all 0.3s ease-in-out;
}
.sidebar nav {
  display: flex;
  padding: 0 10px;
  flex-direction: column;
  height: 100%;
  justify-content: center;
  align-items: flex-end;
  background-color: #3a3a3a;
  position: fixed;
  transition: all 0.3s ease-in-out;
  transform: translateX(0);
}
.sidebar nav a {
  text-decoration: none;
  width: 100%;
  text-align: right;
  color: #f58aff;
  padding: 5px 10px;
  font-size: 22px;
  transition: all 0.5s ease-in-out;
  box-sizing: border-box;
}
.sidebar nav a.active,
.sidebar nav a:hover {
  /*background-color: #181818;*/
  outline: 1px solid #0c0c0c;
  transform: translateX(9px);
  box-shadow: -5px 1px 3px 0px #4e4e4e;
}
@media (max-width: 768px) {
  .sidebar {
    display: none;
  }
  .sidebar nav {
    transform: translateX(-100%);
  }
  .sidebar.shown {
    display: block;
  }
  .sidebar.shown nav {
    transform: translateX(0);
    justify-content: start;
    box-shadow: 3px 3px 10px 3px #f58aff;
    z-index: 100;
  }
  .sidebar.shown + .content {
    transform: translateX(150px);
  }
  .sidebar.shown + .content:after {
    content: "";
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #543c52cc;
    z-index: 10;
  }
}

.content {
  flex-grow: 1;
  padding: 20px;
  transition: all 0.3s ease-in-out;
}

.search-form input[type="text"] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid transparent;
  float: left;
  width: 90%;
  max-width: calc(100% - 40px);
  background: #f1f1f1;
}
.search-form button {
  float: left;
  width: 10%;
  padding: 10px;
  min-width: 40px;
  background: #4dff61;
  color: white;
  font-size: 17px;
  border: 1px solid transparent;
  border-left: none;
  cursor: pointer;
}
.search-form button:hover {
  filter: saturate(2);
}
.search-form button i:before {
  font-family: "FontAwesome";
}

.row {
  margin-bottom: 2rem;
}

.video-card {
  position: relative;
  background-color: #3a3a3a;
  border-radius: 5px;
  overflow: hidden;
  transition: all 0.3s ease-in-out;
}
.video-card img {
  width: 100%;
  height: auto;
}
.video-card .title {
  margin: 15px;
  color: #eee;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  font-weight: 600;
  letter-spacing: 0.5px;
  font-size: 1.2rem;
}
.video-card .category {
  color: #d303fc;
  text-decoration: none;
  display: inline-block;
  padding: 5px 10px 5px 15px;
  background-color: #ccc;
  font-size: 1.1rem;
  position: relative;
}
.video-card .category:after {
  content: "";
  display: block;
  height: 100%;
  width: 36px;
  position: absolute;
  top: 0;
  right: -36px;
  border-top: 18px solid #ccc;
  border-left: 18px solid #ccc;
  border-right: 18px solid transparent;
  border-bottom: 18px solid transparent;
}
.video-card .category:hover {
  font-weight: 600;
}
.video-card .anchor {
  position: absolute;
  display: block;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
}
.video-card:hover {
  transform: translate(-3px, -3px);
  /*box-shadow: 3px 3px 9px 3px #4e4e4e, 0 0 0 3px #d303fc;*/
}

.category-card {
  position: relative;
  overflow: hidden;
}
.category-card img {
  width: 100%;
}
.category-card > a {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-decoration: none;
  font-size: 1.4rem;
  font-weight: 600;
  color: #f58aff;
  text-shadow: 1px 1px 2px #4e4e4e;
  transition: all 0.3s ease-in-out;
}
.category-card:hover img,
.category-card:hover > a {
  /*filter: grayscale(60%);*/
}
.category-card .cat-buttons {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}
@media (min-width: 768px) {
  .category-card .cat-buttons {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100%;
    visibility: hidden;
  }
}
.category-card .cat-buttons a {
  color: #f58aff;
  font-size: 38px;
  /*background-color: #eee;*/
  padding: 5px 15px;
  border-radius: 50%;
}
@media (max-width: 768px) {
  .category-card .cat-buttons a[data-v-332576d4] {
    font-size: 26px;
    padding: 5px 93px;
    border-radius: 3px;
    margin-top: -138px;
    position: relative;
  }
}
.category-card .cat-buttons a:hover {
  color: #d303fc;
}
@media (max-width: 768px) {
  .category-card .cat-buttons a {
    font-size: 26px;
    padding: 5px 40px;
    border-radius: 3px;
    margin-top: 10px;
    position: relative;
  }
}

@media (min-width: 1268px) {
  .category-card img {
    height: 159px;
  }
}
.category-card .cat-buttons i:before {
  font-family: "FontAwesome";
}
.category-card:hover .cat-buttons {
  visibility: visible;
}

.wrap-vid {
  position: relative;

  /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.wrap-vid iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

/*.category-card img {*/
/*    height: 220px;*/
/*    width: 100%;*/
/*}*/
.list,
.start {
  /*margin-top:30px;*/
}

.start {
  float: left;
  margin-left: -101px;
}

.list {
  float: right;
  margin-left: 87px;
}

.category-card a:hover {
}

/*.category-card img {*/
/*    height: 159px;*/
/*}*/
</style>
