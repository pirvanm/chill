<template>
    <div class="body">
    <div class="main">
        <div class="heading">
            <button type="submit" onclick=toggleSidebar()>
                <i class="fa fa-bars"></i></button>
            <span class="title">Chillwhispers</span>
        </div>
        <div class="sidebar">
            <nav>
                <a class="active" href="#">Home</a>
                <a href="#">Categories</a>
                <a href="#">History</a>
                <a href="#">Contact</a>
            </nav>
        </div>
        <div class="content">
            <form class="search-form">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="clearfix"></div>
            <h1>Popular songs</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="video-card">
                            <img src="https://i.ytimg.com/vi/PQQHuUGiOG8/mqdefault.jpg"/>
                            <p class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur venenatis blandit. Praesent vehicula, libero non pretium vulputate, lacus arcu</p>
                            <a class="anchor" href="#anchor-link"></a>
                            <a href="#category-link" class="category">Chillstep</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import Nav from "@/components/Nav";
import newLeftBar from "@/components/newLeftBar";
import newContainerHome from "@/components/newContainerHome";
import newFooter from "@/components/newFooter";
export default {
    components: {
        Nav,
        newLeftBar,
        newContainerHome,
        newFooter
    },

    head: {
        title: "Chillwhispers",
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
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap");
*,
*:before,
*:after {
    font-family: "Roboto", sans-serif;
    box-sizing: border-box;
    margin: 0;
}

.body {
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
.sidebar nav a.active, .sidebar nav a:hover {
    background-color: #181818;
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

.search-form input[type=text] {
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
    box-shadow: 3px 3px 9px 3px #4e4e4e, 0 0 0 3px #d303fc;
}

.category-card {
    position: relative;
}
.category-card img {
    width: 100%;
}
.category-card a {
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
.category-card a:hover {
    background-color: #4e4e4e88;
}

.wrap-vid {
    position: relative;
    padding-bottom: 56.25%;
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

/*# sourceMappingURL=style.css.map */
</style>
