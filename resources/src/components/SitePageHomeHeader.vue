<template>
    <section id="sitePageHomeHeader">
        <div class="hero is-fullheight is-dark">
            <header-slider v-if="false"></header-slider>
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body"><header-banner></header-banner></div>
            <div class="hero-foot"><header-tab></header-tab></div>
        </div>
        <div class="hero is-fullheight is-success">
            <div class="hero-body">
                <p class="title">Title</p>
                <p class="subtitle">SubTitle</p>
            </div>
        </div>
    </section>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
import SitePageHomeHeaderSlider from './SitePageHomeHeaderSlider.vue'
import SitePageHomeHeaderBanner from './SitePageHomeHeaderBanner.vue'
import SitePageHomeHeaderTab from './SitePageHomeHeaderTab.vue'

export default {
    name: 'SitePageHomeHeader',
    components: {
        'header-slider': SitePageHomeHeaderSlider,
        'site-header': SiteHeader,
        'header-banner': SitePageHomeHeaderBanner,
        'header-tab': SitePageHomeHeaderTab
    }
}
</script>
