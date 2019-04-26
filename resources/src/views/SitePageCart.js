import Vue from 'vue'
import axios from 'axios'
import VueLazyload from 'vue-lazyload'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Form from '../js/Form'
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
        user: {},
        routes: {
            productIndex: ''
        }
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
        routePromise(name) {
            return axios.get('/api/option/route/' + name)
        },
        getRoutes() {
            this.routePromise('product.index')
                .then(response => {
                    this.routes.productIndex = response.data
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
    },
    created()
    {
        this.getSiteInfo()
        this.getCart()
        this.checkLogin()
        this.getRoutes()
    }
})