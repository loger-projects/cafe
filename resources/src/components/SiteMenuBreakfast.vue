<template>
    <div id="siteMenuBreakfast">
        <div class="columns">
            <div class="column">
                <h2 class="title is-dancing-script has-text-centered">Food</h2>
                <div class="menus">
                    <div class="menu-type" v-for="foodTypes in foods" :key="foodTypes.id">
                        <p class="type">{{ foodTypes.name }}</p>
                        <ul>
                            <li v-for="menu in foodTypes.menu" :key="menu.id">
                                <div class="media">
                                    <figure class="media-left">
                                        <div class="image is-128x128">
                                            <img src="menu.thumbnail" alt="No Image">
                                        </div>
                                    </figure>
                                    <div class="media-content">
                                        <div class="menu-name">{{ menu.name }}</div>
                                        <!-- Mình sẽ get ingredient tại đoạn này -->
                                        <!-- vấn đề là làm sao get được -->
                                        <site-menu-ingredient :menuID="menu.id"></site-menu-ingredient>
                                    </div>
                                    <div class="media-right">
                                        <div><strong>Price</strong></div>
                                        <span>{{ menu.price }}</span>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    #siteMenuBreakfast {
        margin: 0 auto;
    }
</style>

<script>
import SiteMenuIngredient from './SiteMenuIngredient.vue'

export default {
    name: 'SiteMenuBreakfast',
    components: {
        'site-menu-ingredient': SiteMenuIngredient
    },
    data() {
        return {
            foods: null,
            drinks: null
        }
    },
    computed: {
        origin() {
            return this.$root.siteInfo.origin;
        }
    },
    mounted() {
        axios.get('menu/get/breakfast')
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
