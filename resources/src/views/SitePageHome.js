import Vue from 'vue'
import axios from 'axios'
import buefy from 'buefy'
import SitePageHome from '../ViewComponents/SitePageHome.vue'

window.Vue = Vue;
window.axios = axios;
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        'site-page-home': SitePageHome
    }
})