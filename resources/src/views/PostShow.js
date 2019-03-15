import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
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
        },
        post: null
    },
    mounted() {
        this.siteInfo.origin = location.origin;
        let str = location.href.replace('/post/', '/post/api/');
        axios.get(str)
             .then(response => {
                 this.post = response.data;
             })
             .catch(error => {
                 console.log(error)
             });
    }
})
