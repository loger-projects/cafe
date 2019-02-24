<template>
    <div id="site-page-home-container">
        <site-header>
            <template name="site-header-bg-slot">
                <site-page-home-header-slider></site-page-home-header-slider>
            </template>
            <template slot="site-header-banner-slot">
                <site-page-home-header-banner></site-page-home-header-banner>
            </template>
        </site-header>
    </div>
</template>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SitePageHomeHeaderSlider from '../components/SitePageHomeHeaderSlider.vue'
import SitePageHomeHeaderBanner from '../components/SitePageHomeHeaderBanner.vue'

export default {
    name: 'SitePageHome',
    components: {
        'site-header': SiteHeader,
        'site-page-home-header-slider': SitePageHomeHeaderSlider,
        'site-page-home-header-banner': SitePageHomeHeaderBanner
    }
}
</script>