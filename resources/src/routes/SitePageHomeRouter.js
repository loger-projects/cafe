import Vue from 'vue'
import Router from 'vue-router'
import SiteMenuMealBreakfast from '../components/SiteMenuMealBreakfast.vue'
import SiteMenuMealLunch from '../components/SiteMenuMealLunch.vue'
import SiteMenuMealDinner from '../components/SiteMenuMealDinner.vue'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/breakfast',
            name: 'MealBreakfast',
            component: SiteMenuMealBreakfast
        },
        {
            path: '/lunch',
            name: 'MealLunch',
            component: SiteMenuMealLunch
        },
        {
            path: '/dinner',
            name: 'MealDinner',
            component: SiteMenuMealDinner
        }
    ]
})