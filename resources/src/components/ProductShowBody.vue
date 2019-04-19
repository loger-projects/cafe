<template>
    <div id="productShowBody">
        <div class="container">
            <div class="columns" id="content-wrapper">
                <div class="column is-9" id="content">
                    <product-show-item></product-show-item>
                    <product-show-detail></product-show-detail>
                    <product-show-related></product-show-related>
                </div>
                <div id="sidebar" class="column is-3">
                    <product-sidebar></product-sidebar>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ProductSidebar from './ProductSidebar.vue'
import ProductShowItem from './ProductShowItem.vue'
import ProductShowDetail from './ProductShowDetail.vue'
import ProductShowRelated from './ProductShowRelated.vue'

export default {
    name: 'ProductShowBody',
    components: {
        ProductSidebar,
        ProductShowItem,
        ProductShowDetail,
        ProductShowRelated,
    }
}
</script>

<style lang="scss" scoped>
    #productShowBody {
        padding-top: 70px;
        #content-wrapper {
            flex-direction: row-reverse;
        }
    }
</style>
