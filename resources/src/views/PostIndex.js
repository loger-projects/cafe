import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import PostIndex from '../templates/PostIndex.vue'

window.Vue = Vue
window.axios = axios
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)
Vue.use(VueCarousel)

new Vue({
    el: '#root',
    components: {
        'post-index': PostIndex
    },
    data: {
        siteInfo: {},
        latestPosts: [],
        categories: [],
        galleries: [],
        posts: [],
        pagination: {}
    },
    computed: {
        headerBackgroundURL() {
            return location.origin + '/img/posts/PostIndexHeaderBackground.jpg'
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
                });
        },
        getLatestPosts($amount) {
            axios.get('/api/post/' + $amount + '/latest-posts')
                 .then(response => {
                     this.latestPosts = response.data
                 })
                 .catch(error => {
                     console.log(error.response.data.message)
                 })
        },
        getCategories($amount) {
            axios.get('/api/post/categories/' + $amount)
                 .then(response => {
                     this.categories = response.data
                 })
                 .catch(error => {
                     console.log(error.response.data.message)
                 })
        },
        getGalleries($amount) {
            axios.get('/api/galleries/'+$amount)
                 .then(response => {
                    this.galleries = response.data
                 })
                 .catch(error => {
                    console.log(error.response.data.message)
                 })
        },
        getPosts() {
            axios.get('/api/posts')
                 .then(response => {
                     this.posts = response.data.data
                     delete response.data.data
                     this.pagination = response.data
                 })
                 .catch(error => {
                     console.log(error.response.data.message)
                 })
        }
    },
    created() {
        this.getSiteInfo();
        this.getLatestPosts(5);
        this.getCategories(5);
        this.getGalleries(6);
        this.getPosts();
    }
})