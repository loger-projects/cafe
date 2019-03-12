import Vue from 'vue'
import axios from 'axios'
// import router from '../routes/SitePageHomeRouter.js'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import VueCarousel from 'vue-carousel'
import VueMoment from 'vue-moment'
import SitePageHome from '../ViewComponents/SitePageHome.vue'

window.Vue = Vue;
window.axios = axios;
Vue.use(buefy)
Vue.use(VueCarousel)
Vue.use(VueMoment)

new Vue({
    el: '#root',
    // router,
    components: {
        'site-page-home': SitePageHome
    },
    data: {
        siteInfo: {
            name: 'Dawat Restaurant',
            origin: null,
            logoWhite: null,
            logoBlack: null
        }
    },
    mounted() {
        this.siteInfo.origin = location.origin;
        this.siteInfo.logoWhite = location.origin + '/img/SiteHeaderLogoWhite.jpg';
        this.siteInfo.logoBlack = location.origin + '/img/SiteHeaderLogoBlack.jpg';
    }
})