<template>
    <div id="site-page-home">
        <site-header>
            <template slot="site-header-background">
                <site-page-home-header-slider></site-page-home-header-slider>
            </template>
            <template slot="site-header-banner">
                <site-page-home-header-banner></site-page-home-header-banner>
            </template>
        </site-header>
    </div>
</template>

<style lang="scss" scoped>
    div#site-page-home {
        position: relative;
        div#site-page-home-header-slider {
            z-index: -1;
        }
        div#site-header-nav {
            z-index: 3;
        }
        div#site-page-home-header-banner {
            z-index: 1;
        }
    }
</style>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SitePageHomeHeaderSlider from '../components/SitePageHomeHeaderSlider.vue'
import SitePageHomeHeaderBanner from '../components/SitePageHomeHeaderBanner.vue'

export default {
    name: 'SitePageHome',
    data() {
        return {
            SiteHeaderNavHeight: 0
        }
    },
    components: {
        'site-header': SiteHeader,
        'site-page-home-header-slider': SitePageHomeHeaderSlider,
        'site-page-home-header-banner': SitePageHomeHeaderBanner
    },
    mounted() {
        var siteHeaderNavHeight = this.$el.querySelector('#site-header-nav').offsetHeight;
        var windowHeight = window.innerHeight;
        this.$el.querySelector('#site-page-home-header-banner').style.height = windowHeight - siteHeaderNavHeight +'px';
    }
}
</script>