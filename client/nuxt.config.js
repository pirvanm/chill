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
  // Global page headers: https://go.nuxtjs.dev/config-head
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

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    "./assets/styles/app.scss",
    "~/assets/styles/app.css",
    // "@fortawesome/fontawesome-free/css/all.css",
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
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

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    "@nuxtjs/dotenv",
    "@nuxtjs/google-analytics",
    "@nuxtjs/fontawesome",
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    "bootstrap-vue/nuxt",
    // https://go.nuxtjs.dev/axios
    "@nuxtjs/axios",

    "@nuxtjs/auth-next",
    // https://go.nuxtjs.dev/pwa
    "@nuxtjs/pwa",
    // https://go.nuxtjs.dev/content
    "@nuxt/content",

    "@nuxtjs/sitemap",
    "nuxt-fontawesome",
    "@nuxtjs/proxy",
    "@nuxtjs/i18n",
  ],

  i18n: {
    locales: [
      {
        code: "en",
        file: "en.js",
        name: "English",
      },
      {
        code: "ru",
        file: "ru.js",
        name: "Romanian",
      },
      {
        code: "in",
        file: "in.js",
        name: "Hindi",
      },
    ],
    lazy: true,
    defaultLocale: "en",
    langDir: "lang/",
    detectBrowserLanguage: {
      useCookie: true,
      cookieKey: "i18n_redirected",
      redirectOn: "root", // recommended
    },
  },

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

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: process.env.BASE_URL,
    proxy: false,
  },

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

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: "en",
    },
  },

  // Content module configuration: https://go.nuxtjs.dev/config-content
  content: {},

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    transpile: ["vue-instantsearch", "instantsearch.js/es"],
    // postcss: {
    //   plugins: {
    //     tailwindcss: "./tailwind.config.js",
    //   },
    // },
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
