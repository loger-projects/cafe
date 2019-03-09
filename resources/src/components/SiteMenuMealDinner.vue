<template>
    <menu-meal meal="dinner"></menu-meal>
</template>

<script>
import SiteMenuMeal from './SiteMenuMeal.vue'

export default {
    name: 'SiteMenuMealDinner',
    components: {
        'menu-meal': SiteMenuMeal
    }
}
</script>