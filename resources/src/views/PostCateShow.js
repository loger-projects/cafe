import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import PostCateShow from '../templates/PostCateShow.vue'

window.Vue = Vue
window.axios = axios
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)
Vue.use(VueCarousel)

new Vue({
    el: '#root',
    components: {
        'post-cate-show': PostCateShow
    },
    data: {
        siteInfo: {},
        category: {},
        posts: [],
        pagination: {},
        latestPosts: [],
        categories: [],
        galleries: [],
    },
    computed: {
        headerBackgroundURL() {
            return location.origin + '/img/posts/PostCateShowHeaderBackground.jpg'
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
        getLatestPosts(amount) {
            axios.get('/api/post/' + amount + '/latest-posts')
                 .then(response => {
                     this.latestPosts = response.data
                 })
                 .catch(error => {
                     console.log(error.response.data.message)
                 })
        },
        getCategories(amount) {
            axios.get('/api/post/categories/' + amount)
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
        getPosts() {
            let str = location.href.replace('/post/', '/api/post/')
            axios.get(str)
                 .then(response => {

                     // get this.category
                     this.category = response.data.category

                     // get this.posts
                     this.posts = response.data.posts.data

                     // delete posts data from response.data.posts
                     delete response.data.posts.data

                     // get this.pagination
                     this.pagination = response.data.posts
                 })
                 .catch(error => {
                     console.log(error.response.data.message)
                 })
        },
    },
    created() {
        this.getSiteInfo();
        this.getPosts();
        this.getLatestPosts(5);
        this.getCategories(5);
        this.getGalleries(6);
    }
})