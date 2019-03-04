import Vue from 'vue'
import buefy from 'buefy'
import 'buefy/dist/buefy.css'
import BulmaComponent from '../viewComponents/BulmaComponent.vue'

window.Vue = Vue
Vue.use(buefy)

new Vue({
    components: {
        'bulma-component' : BulmaComponent
    }
}).$mount('#root');