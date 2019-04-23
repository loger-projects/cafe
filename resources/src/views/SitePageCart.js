import Vue from 'vue'
import axios from 'axios'
import VueLazyload from 'vue-lazyload'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Form from '../js/From'
import SitePageCart from '../templates/SitePageCart.vue'

window.Vue = Vue
window.axios = axios
window.Form = Form
Vue.use(VueLazyload)
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        SitePageCart
    },
    data: {
        siteInfo: {},
        cart: [],
        isLogin: false,
        user: {}
    },
    methods: {
        getSiteInfo() {
            axios.get('/api/option/site-info')
                .then(response => {
                    this.siteInfo = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getCart() {
            axios.get('/api/cart')
                .then(response => {
                    this.cart = Object.values(response.data);
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        checkLogin() {
            axios.get('/api/user/auth-check')
                .then(response => {
                    if(response) {
                        this.user = response.data
                        this.isLogin = true
                    } else {
                        this.isLogin = false
                        this.user = {}
                    }
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        }
    }
})