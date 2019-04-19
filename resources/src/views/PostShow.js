import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Form from '../js/Form'
import PostShow from '../templates/PostShow.vue'

window.Vue = Vue
window.axios = axios
window.Form = Form
Vue.use(VueMoment)
Vue.use(VueLazyload)
Vue.use(buefy)
Vue.use(VueCarousel)

new Vue({
    el: '#root',
    components: {
        'post-show': PostShow
    },
    data: {
        siteInfo: {},
        post: {},
        headerBackgroundURL: '',
        comments: [],
        relatedPosts: [],
        latestPosts: [],
        author: {},
        categories: [],
        galleries: []
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
        getAuthor(post) {
            axios.get('/api/user/show/' + post.user_id)
                .then(response => {
                    this.author = response.data;
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getComments(post) {
            axios.get('/api/post/' + post.id + '/comments')
                .then(response => {
                    this.comments = response.data;
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        },
        getRelatedPosts(post, amount) {
            axios.get('/api/post/' + post.id + '/category/' + post.cate_id + '/related/' + amount)
                .then(response => {
                    this.relatedPosts = response.data
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
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
        getPost() {
            let url = location.href.replace('/post/', '/api/post/')
            axios.get(url)
                .then(response => {
                    this.post = response.data
                    this.headerBackgroundURL = response.data.thumbnail
                    this.getAuthor(response.data)
                    this.getComments(response.data)
                    this.getRelatedPosts(response.data, 5)
                    })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getSiteInfo()
        this.getPost()
        this.getLatestPosts(5)
        this.getCategories(5)
        this.getGalleries(6)
    }
})
