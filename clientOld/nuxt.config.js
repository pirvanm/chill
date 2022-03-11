require("dotenv").config();

import axios from "axios";
export default {
    env: {
        baseUrl: process.env.BASE_URL || "http://localhost:3000",
    },
    generate: {
        /* routes () {
            return axios.get('https://chillwhispers.com/')
                .then((res) => {
                    return res.data.map((user) => {
                        return '/users/' + user.id
                    })
                })
        }*/
    },
    mode: "universal",
    /*
     ** Headers of the page
     */
    head: {
        meta: [
            { charset: "utf-8" },
            {
                name: "viewport",
                content: "width=device-width, initial-scale=1",
            },
        ],
        link: [
            { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
            {
                rel: "stylesheet",
                href: "https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css",
            },
        ],
    },
    /*
     ** Customize the progress-bar color
     */
    loading: { color: "#fff", background: "black" },

    /*
     ** Global CSS
     */
    css: [
        "./assets/styles/app.scss",
        "~/assets/styles/app.css",
        "@fortawesome/fontawesome-free/css/all.css",
    ],
    /*
     ** Plugins to load before mounting the App
     */
    plugins: [
        { src: "~/plugins/youtube", ssr: true },
        // { src: "~/plugins/analytics", ssr: false },
        { src: "~/plugins/fontawesome", ssr: false },
        { src: "~/plugins/autocomplete", ssr: false },
        { src: "~/plugins/notifications", ssr: false },
        { src: "~/plugins/paginate", ssr: false },
        { src: "~/plugins/range-slider", ssr: false },
        { src: "~/plugins/draggable", ssr: false },
        // { src: "~/plugins/sweetalert", ssr: false }
    ],
    /*
     ** Nuxt.js dev-modules
     */
    buildModules: [
        "@nuxtjs/dotenv",
        "@nuxtjs/google-analytics",
        "@nuxtjs/fontawesome",
    ],

    fontawesome: {
        icons: {
            solid: true,
            regular: true,
            brands: true,
        },
        suffix: true,
    },
    googleAnalytics: {
        id: "UA-133292357-1",
    },
    /*
     ** Nuxt.js modules
     */
    modules: [
        //      '@nuxtjs/ngrok',
        // Doc: https://bootstrap-vue.js.org/docs/
        "bootstrap-vue/nuxt",
        // Doc: https://axios.nuxtjs.org/usage
        "@nuxtjs/axios",
        //  "@nuxtjs/auth",
        "@nuxtjs/auth-next",

        "@nuxtjs/pwa",

        "@nuxtjs/sitemap",
        "nuxt-fontawesome",
        "@nuxtjs/proxy",
        /* '~/plugins/algolia'*/
    ],

    auth: {
        strategies: {
            local: {
                token: {
                    property: "token",
                    required: true,
                    maxAge: 2592000,
                    type: "Bearer",
                },
                user: {
                    property: "data",
                    autoFetch: true,
                },
                endpoints: {
                    login: { url: "/auth/login", method: "post" },
                    logout: { url: "/auth/logout", method: "post" },
                    user: { url: "/auth/user", method: "get" },
                },
                redirect: {
                    login: "/login",
                    logout: "/login",
                    callback: "/login",
                    home: false,
                },
            },
        },
        plugins: [
            { src: "~/plugins/auth", ssr: true },
            { src: "~/plugins/axios", ssr: true },
        ],
    },
    /*
    sitemap: {
        hostname: 'https://chillwhispers.com',
        lastmod: '2017-06-30',
        sitemaps: [
            {
                path: '/sitemap.xml',
                cacheTime: 1000 * 60 * 60 * 2,
                trailingSlash: true,
                routes: [
                    '/videos/chillhop/:id',
                    '/videos/ambiental/:id',
                    '/watch/:id',
                   'watch/nBnjjZkeknY'
                ],

                gzip: true
            },
            {
                path: '/sitemap.xml',
                routes: async () => {
                    const { data } = await axios.get('https://chillwhispers.com/videos/')
                    return data.map(user => `/lofi/${user.username}`)
                },
                exclude: ['admin/!**']
            }
        ]
    },
*/
    // fontawesome: {
    //     imports: [
    //         {
    //             set: '@fortawesome/free-solid-svg-icons', // Solid icons
    //             icons: ['faCookieBite', 'faCommentDots', 'faEnvelope', 'faGrinWink', 'faHeart']
    //         },
    //         {
    //             set: '@fortawesome/free-brands-svg-icons', // Brand icons
    //             icons: ['faDev', 'faFacebook', 'faTwitter', 'faInstagram', 'faYoutube', 'faGithub']
    //         }
    //     ]
    // },
    // sitemap: {
    //     hostname: 'https://example.com',
    //     gzip: true,
    //     exclude: [
    //         '/secret',
    //         '/admin/**'
    //     ],
    //     routes: [
    //         '/watch/',
    //         '/page/2',
    //         {
    //             url: '/page/3',
    //             changefreq: 'daily',
    //             priority: 1,
    //             lastmod: '2017-06-30T13:30:00.000Z'
    //         }
    //     ]
    // },
    /*
     ** Axios module configuration
     ** See https://axios.nuxtjs.org/options
     */
    axios: {
        baseURL: process.env.BASE_URL,
        proxy: false,
    },

    // proxy: {
    //     '/api/': { target: process.env.BASE_URL, pathRewrite: { '^/api/': '' } }
    // }
    /*
     ** Build configuration
     */
    build: {
        transpile: ["vue-instantsearch", "instantsearch.js/es"],
        postcss: {
            plugins: {
                tailwindcss: "./tailwind.config.js",
            },
        },
        extractCSS: true,
        /*
         ** You can extend webpack config here
         */
        extend(config, ctx) {},
    },
    server: {
        port: process.env.SERVER_PORT || 3000, // default: 3000
        host: process.env.SERVER_IP || "localhost", // default: localhost,
    },
};
