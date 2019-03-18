import Vue from 'vue'
import axios from 'axios'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import VueCarousel from 'vue-carousel'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import SitePageHome from '../ViewComponents/SitePageHome.vue'
// import router from '../routes/SitePageHomeRouter.js'

window.Vue = Vue;
window.axios = axios;
Vue.use(buefy)
Vue.use(VueCarousel)
Vue.use(VueMoment)
Vue.use(VueLazyload)

new Vue({
    el: '#root',
    // router,
    components: {
        'site-page-home': SitePageHome
    },
    data: {
        siteInfo: {}
    },
    mounted() {
        axios.get(location.origin + '/api/option/site-info')
             .then(response => {
                this.siteInfo = response.data
             })
             .catch(error => {
                 console.log(error)
             });
    }
})