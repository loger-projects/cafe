import Vue from 'vue'
import axios from 'axios'
import SitePageHome from '../ViewComponents/SitePageHome.vue'

window.Vue = Vue;
window.axios = axios;

new Vue({
    el: '#root',
    components: {
        'site-page-home': SitePageHome
    },
    data: {
        message: 'Hello World. Loger is Comming Back'
    }
})