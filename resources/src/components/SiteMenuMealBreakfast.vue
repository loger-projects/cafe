<template>
    <menu-meal meal="breakfast"></menu-meal>
</template>

<script>
import SiteMenuMeal from './SiteMenuMeal.vue'

export default {
    name: 'SiteMenuMealBreakfast',
    components: {
        'menu-meal': SiteMenuMeal
    }
}
</script>