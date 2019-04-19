<template>
    <div id="productIndex">
        <product-index-header></product-index-header>
        <product-index-body></product-index-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import ProductIndexHeader from '../components/ProductIndexHeader.vue'
import ProductIndexBody from '../components/ProductIndexBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'ProductIndex',
    components: {
        ProductIndexHeader,
        ProductIndexBody,
        SiteFooter
    }
}
</script>
