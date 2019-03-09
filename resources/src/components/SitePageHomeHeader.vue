<template>
    <section id="sitePageHomeHeader">
        <header-slider></header-slider>
        <div class="hero is-fullheight">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body"><header-banner></header-banner></div>
            <div class="hero-foot"><header-footer></header-footer></div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #sitePageHomeHeader {
        position: relative;
        .hero {
            .hero-body {
                justify-content: center;
            }
        }
    }
</style>

<script>
import SiteHeader from './SiteHeader.vue'
import SitePageHomeHeaderSlider from './SitePageHomeHeaderSlider.vue'
import SitePageHomeHeaderBanner from './SitePageHomeHeaderBanner.vue'
import SitePageHomeHeaderFooter from './SitePageHomeHeaderFooter.vue'

export default {
    name: 'SitePageHomeHeader',
    components: {
        'header-slider': SitePageHomeHeaderSlider,
        'site-header': SiteHeader,
        'header-banner': SitePageHomeHeaderBanner,
        'header-footer': SitePageHomeHeaderFooter
    }
}
</script>
