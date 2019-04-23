<template>
    <div id="productCateshow">
        <product-cate-show-header></product-cate-show-header>
        <product-cate-show-body></product-cate-show-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import ProductCateShowHeader from '../components/ProductCateShowHeader.vue'
import ProductCateShowBody from '../components/ProductCateShowBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'ProductCateShow',
    components: {
        ProductCateShowHeader,
        ProductCateShowBody,
        SiteFooter
    }
}
</script>
