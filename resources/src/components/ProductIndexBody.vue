<template>
    <div id="productIndexBody">
        <div class="container">
            <div class="columns">
                <div id="sidebar" class="column is-3">
                    <product-sidebar></product-sidebar>
                </div>
                <div id="content" class="comlumn is-9">
                    <product-item v-for="product in products" :key="product.id" :product="product"></product-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductSidebar from './ProductSidebar.vue'
import productItem from './ProductItem.vue'

export default {
    name: 'ProductIndexBody',
    components: {
        ProductSidebar,
        productItem
    },
    computed: {
        products() { return this.$root.products }
    }
}
</script>

<style lang="scss" scoped>
    
</style>