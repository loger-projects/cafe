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
        siteInfo: {},
        post: {},
        author: {},
        comments: []
    },
    methods: {
        getAuthorInfo(post) {
            axios.get(location.origin + '/api/user/show/' + post.user_id)
                .then(response => {
                    this.author = response.data
                })
                .catch(error => {
                    console.log(error)
                });
        },
        getComments(post) {
            axios.get(location.origin + '/api/post/' + post.id + '/comments')
                .then(response => {
                    this.comments = response.data;
                })
                .catch(error => {
                    console.log(error)
                });
        }
    },
    created() {
        axios.get(location.origin + '/api/option/site-info')
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
                 this.getAuthorInfo(response.data);
                 this.getComments(response.data);
             })
             .catch(error => {
                 console.log(error)
             })
             .then(data => {
                 console.log(data)
             });
    }
})
