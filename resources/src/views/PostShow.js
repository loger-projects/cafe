import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyLoad from 'vue-lazyload'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import PostShow from '../ViewComponents/PostShow.vue'

window.Vue = Vue
window.axios = axios
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        'post-show': PostShow
    },
    data: {
        siteInfo: {
            name: 'Dawat Restaurant',
            origin: null
        }
    },
    props: ['post'],
    mounted() {
        this.siteInfo.origin = location.origin;
    }
})
