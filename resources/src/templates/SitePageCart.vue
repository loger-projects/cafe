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
    }
}
</script>
