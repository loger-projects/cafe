<template>
    <div id="sitePageCart">
        <site-page-cart-header></site-page-cart-header>
        <site-page-cart-body></site-page-cart-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import SitePageCartHeader from '../components/SitePageCartHeader.vue'
import SitePageCartBody from '../components/SitePageCartBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'SitePageCart',
    components: {
        SitePageCartHeader,
        SitePageCartBody,
        SiteFooter
    },
    mounted() {
        let cart = document.getElementById('sitePageCart')
        let cartHeader = document.getElementById('sitePageCartHeader')
        let cartBody = document.getElementById('sitePageCartBody')
        let cartFooter = document.getElementById('siteFooter')
        cartBody.style.minHeight = cart.offsetHeight - (cartHeader.offsetHeight + cartFooter.offsetHeight) + 'px'
    }
}
</script>

<style lang="scss">
    #sitePageCart {
        min-height: 100vh !important;
    }
</style>