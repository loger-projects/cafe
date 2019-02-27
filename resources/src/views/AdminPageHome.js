import Vue from 'vue'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import AdminPageHome from '../ViewComponents/AdminPageHome.vue'

window.Vue = Vue
Vue.use(buefy)

new Vue({
    components: {
        'admin-page-home': AdminPageHome
    }
}).$mount('#root');