<template>
    <menu-meal meal="lunch"></menu-meal>
</template>

<script>
import SiteMenuMeal from './SiteMenuMeal.vue'

export default {
    name: 'SiteMenuMealLunch',
    components: {
        'menu-meal': SiteMenuMeal
    }
}
</script>