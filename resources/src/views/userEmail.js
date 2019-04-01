import Vue from 'vue'
import axios from 'axios'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import UserEmail from '../ViewComponents/UserEmail.vue'
import Form from '../js/Form'

window.Vue = Vue
window.axios = axios
window.Form = Form
Vue.use(buefy)

new Vue({
    el: '#root',
    components: {
        UserEmail
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