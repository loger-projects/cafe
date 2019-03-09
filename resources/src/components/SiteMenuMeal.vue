<template>
    <div id="SiteMenuMeal">
        <div class="columns">
            <div class="column menu-column">
                <h2 class="title is-dancing-script has-text-centered main-title">Food</h2>
                <menu-list :foods="foods"></menu-list>
            </div>
            <div class="column menu-column">
                <h2 class="title is-dancing-script has-text-centered main-title">Drink</h2>
                <menu-list :foods="drinks"></menu-list>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    #SiteMenuMeal {
        .menu-column {
            .main-title {
                margin: 30px 0;
            }
        }
    }
</style>

<script>
import SiteMenuIngredient from './SiteMenuIngredient.vue'
import SiteMenuList from './SiteMenuList.vue'

export default {
    name: 'SiteMenuMeal',
    props: ['meal'],
    components: {
        'menu-ingredient': SiteMenuIngredient,
        'menu-list': SiteMenuList
    },
    data() {
        return {
            foods: null,
            drinks: null
        }
    },
    mounted() {
        axios.get('menu/get/' + this.meal + '/meal')
             .then(response => {
                this.foods = Object.values(response.data.food);
                this.drinks = Object.values(response.data.drink);
             })
             .catch(response => {
                console.log(response)
             });
    }
}
</script>
