import Vue from 'vue'
import axios from 'axios'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import UserVerify from '../ViewComponents/UserVerify.vue'

window.Vue = Vue
window.axios = axios
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        UserVerify
    },
    data: {
        siteInfo: {}
    },
    created() {
        axios.get('/api/option/site-info')
            .then(response => {
                this.siteInfo = response.data
            })
            .catch(error => {
                console.log(error.response.data.message)
            });
    }
});