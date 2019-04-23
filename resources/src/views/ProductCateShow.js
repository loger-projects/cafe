import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import ProductCateShow from '../templates/ProductCateShow.vue'

window.Vue = Vue
window.axios = axios
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)
Vue.use(VueCarousel)

new Vue({
    el: '#root',
    components: {
        ProductCateShow
    },
    data: {
        siteInfo: {},
        products: [],
        category: {},
        categories: [],
        galleries: [],
        cart: [],
        pagination: {}
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
        getProducts() {
            let url = location.href.replace('/product/','/api/product/') + '/products'
            axios.get(url)
                .then(response => {
                    this.products = response.data.data
                    delete response.data.data
                    this.pagination = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getCategory() {
            let url = location.href.replace('/product/', '/api/product/')
            axios.get(url)
                .then(response => {
                    this.category = response.data
                })
                .catch(error => {
                    console.log(error.response.data)
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
        getGalleries(amount) {
            axios.get('/api/galleries/'+amount)
                 .then(response => {
                    this.galleries = response.data
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
        }
    },
    created() {
        this.getSiteInfo()
        this.getProducts()
        this.getCategory()
        this.getCategories(6)
        this.getGalleries(6)
        this.getCart()
    }
})