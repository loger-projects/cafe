<template>
    <div id="productIndexBody">
        <div class="columns">
            <div id="sitebar" class="column is-3">
                <product-sitebar></product-sitebar>
            </div>
            <div id="content" class="comlumn is-9">
                <product-item v-for="product in products" :key="product.id"></product-item>
            </div>
        </div>
    </div>
</template>

<script>
import ProductSitebar from './ProductSitebar.vue'
import productItem from './ProductItem.vue'

export default {
    name: 'ProductIndexBody',
    components: {
        ProductSitebar,
        productItem
    },
    computed: {
        products() { return this.$root.products }
    }
}
</script>

<style lang="scss" scoped>
    
</style>