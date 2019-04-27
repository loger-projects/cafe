import Vue from 'vue'
import axios from 'axios'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Form from '../js/Form'
import SitePageCheckout from '../templates/SitePageCheckout.vue'

window.Vue = Vue
window.axios = axios
window.Form = Form
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        SitePageCheckout
    },
    data: {
        siteInfo: {},
        cart: [],
        user: {
            name: '',
            email: '',
            phone: '',
            street_address: '',
            city: '',
            country: '',
            zipcode: ''
        },
        routes: {
            sitePageCheckout: '',
            sitePageCheckoutEnd: '',
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
        getCart() {
            axios.get('/api/cart')
                .then(response => {
                    this.cart = Object.values(response.data);
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getUser() {
            axios.get('/api/user/auth')
                .then(response => {
                    if(response.data) {
                        this.user = response.data
                    }
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },
        routePromise(name) {
            return axios.get('/api/option/route/' + name)
        },
        getRoutes() {
            this.routePromise('site.page.checkout')
                .then(response => {
                    this.routes.sitePageCheckout = response.data
                })
            this.routePromise('site.page.checkout.end')
                .then(response => {
                    this.routes.sitePageCheckoutEnd = response.data
                })
        },
    },
    created() {
        this.getSiteInfo()
        this.getCart()
        this.getUser()
        this.getRoutes()
    }
})