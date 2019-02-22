import Vue from 'vue'
import axios from 'axios'
import HomePage from './Pages/HomePage.vue'


window.Vue = Vue;
window.axios = axios;


new Vue({
    data: {
        message: 'This is a message'
    },
    components: {
        HomePage
    }
}).$mount('$root');