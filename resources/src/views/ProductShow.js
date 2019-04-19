import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import ProductShow from '../templates/ProductShow.vue'
import StarRating from 'vue-star-rating'
import Form from '../js/Form'

window.Vue = Vue
window.axios = axios
window.Form = Form
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)
Vue.use(VueCarousel)
Vue.component('star-rating', StarRating)

new Vue({
    el: '#root',
    components: {
        ProductShow,
    },
    data: {
        siteInfo: {},
        product: {},
        reviews: [],
        relatedProducts: [],
        categories: [],
        cart: [],
        galleries: [],
        auth: {},
        isLogin: false
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
        getProduct() {
            let url = location.href.replace('/product/', '/api/product/')
            axios.get(url)
                .then(response => {
                    this.product = response.data
                    this.getReviews(response.data.id)
                    this.getRelatedProducts(response.data.id)
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getReviews(productId) {
            axios.get('/api/product/'+productId+'/reviews')
                .then(response => {
                    this.reviews = response.data
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        },
        getRelatedProducts(productId) {
            axios.get('/api/product/'+productId+'/related')
                .then(response => {
                    this.relatedProducts = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getCategories(amount) {
            axios.get('/api/product/categories/'+amount)
                .then(response => {
                    this.categories = response.data
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
        getGalleries(amount) {
            axios.get('/api/galleries/'+amount)
                 .then(response => {
                    this.galleries = response.data
                 })
                 .catch(error => {
                    console.log(error.response.data.message)
                 })
        },
        checkLogin() {
            axios.get('/api/user/auth-check')
                .then(response => {
                    if(response) {
                        this.auth = response.data
                        this.isLogin = true
                    }
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        }
    },
    created() {
        this.getSiteInfo()
        this.getProduct()
        this.getCategories(6)
        this.getCart()
        this.getGalleries(6)
        this.checkLogin()
    }
})