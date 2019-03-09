<template>
    <div class="menus">
        <div v-for="foodTypes in foods" :key="foodTypes.id">
            <p class="type-name">{{ foodTypes.name }}</p>
            <ul class="menu-item-wrap">
                <li class="menu-item" v-for="menu in foodTypes.menu" :key="menu.id">
                    <div class="media">
                        <figure class="media-left">
                            <div class="image is-128x128 is-1by1">
                                <img :src="menu.thumbnail" alt="No Image">
                            </div>
                        </figure>
                        <div class="media-content">
                            <div class="menu-item-name">{{ menu.name }}</div>
                            <menu-ingredient :menuID="menu.id"></menu-ingredient>
                        </div>
                        <div class="media-right">
                            <div><strong>Price</strong></div>
                            <span>{{ menu.price }} $</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .menus {
        .type-name {
            font-size: 2rem;
            color: rgb(209, 108, 26);
            font-weight: bold;
            font-family: 'Dancing Script';
            text-align: left;
            margin-bottom: 1.5rem;
        }
        .menu-item-wrap {
            padding-left: 30px;
            .menu-item {
                border: 1px solid rgba(65, 58, 53, 0.719);
                margin-bottom: 20px;
                .media {
                    .media-content {
                        .menu-item-name {
                            border-bottom: 1px solid rgba(43, 40, 38, 0.418);
                            font-size: 1.25rem;
                            font-weight: bold;
                        }
                    }
                    .media-right {
                        padding-right: 1rem;
                        padding-top: 1rem;
                        text-align: center;
                        div {
                            font-size: 1.25rem;
                            padding-bottom: 5px;
                        }
                        span {
                            color: rgb(26, 10, 1);
                            font-weight: bold;
                        }
                    }
                }
            }
        }
    }
</style>

<script>
import SiteMenuIngredient from './SiteMenuIngredient.vue'

export default {
    name: 'SiteMenulist',
    props: ['foods'],
    components: {
        'menu-ingredient': SiteMenuIngredient
    }
}
</script>