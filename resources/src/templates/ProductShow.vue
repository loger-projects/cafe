<template>
    <div id="productShow">
        <product-show-header></product-show-header>
        <product-show-body></product-show-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import ProductShowHeader from '../components/ProductShowHeader.vue'
import ProductShowBody from '../components/ProductShowBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'ProductShow',
    components: {
        ProductShowHeader,
        ProductShowBody,
        SiteFooter
    }
}
</script>
