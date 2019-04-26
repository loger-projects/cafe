<template>
    <div id="sitePageCheckout">
        <site-page-checkout-header></site-page-checkout-header>
        <site-page-checkout-body></site-page-checkout-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import SitePageCheckoutHeader from '../components/SitePageCheckoutHeader.vue'
import SitePageCheckoutBody from '../components/SitePageCheckoutBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'SitePageCheckout',
    components: {
        SitePageCheckoutHeader,
        SitePageCheckoutBody,
        SiteFooter
    },
}
</script>
