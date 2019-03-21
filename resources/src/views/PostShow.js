import Vue from 'vue'
import axios from 'axios'
import VueMoment from 'vue-moment'
import VueLazyload from 'vue-lazyload'
import VueCarousel from 'vue-carousel'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import Form from '../js/Form'
import PostShow from '../ViewComponents/PostShow.vue'

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
        comments: [],
        relatedPosts: [],
        author: {}
    },
    methods: {
        getAuthor(post) {
            axios.get('/api/user/show/' + post.user_id)
                .then(response => {
                    this.author = response.data;
                })
                .catch(error => {
                    console.log(error.message)
                })
        },
        getComments(post) {
            axios.get('/api/post/' + post.id + '/comments')
                .then(response => {
                    this.comments = response.data;
                })
                .catch(error => {
                    console.log(error)
                });
        },
        getRelatedPosts(post, amount) {
            axios.get('/api/post/' + post.id + '/category/' + post.cate_id + '/related/' + amount)
                .then(response => {
                    this.relatedPosts = response.data
                })
                .catch(error => {
                    console.log(error.message)
                });
        }
    },
    created() {
        axios.get('/api/option/site-info')
             .then(response => {
                this.siteInfo = response.data
             })
             .catch(error => {
                 console.log(error)
             });

        // get database of current post
        let str = location.href.replace('/post/', '/api/post/');
        axios.get(str)
             .then(response => {
                 this.post = response.data;
                 this.getAuthor(response.data);
                 this.getComments(response.data);
                 this.getRelatedPosts(response.data, 5);
             })
             .catch(error => {
                 console.log(error)
             })
    }
})
