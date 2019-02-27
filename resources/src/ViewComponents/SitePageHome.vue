<template>
    <div id="site-page-home">
        <site-header>
            <template slot="site-header-background">
                <header-slider></header-slider>
            </template>
            <template slot="site-header-banner">
                <header-banner></header-banner>
            </template>
        </site-header>
        <book-table></book-table>
    </div>
</template>

<style lang="scss" scoped>
    div#site-page-home {
        position: relative;
        div#header-slider {
            z-index: -1;
        }
        div#site-header-nav {
            z-index: 3;
        }
        div#header-banner {
            z-index: 1;
        }
    }
</style>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SitePageHomeHeaderSlider from '../components/SitePageHomeHeaderSlider.vue'
import SitePageHomeHeaderBanner from '../components/SitePageHomeHeaderBanner.vue'
import SitePageHomeBookTable from '../components/SitePageHomeBookTable.vue'

export default {
    name: 'SitePageHome',
    data() {
        return {
            SiteHeaderNavHeight: 0
        }
    },
    components: {
        'site-header': SiteHeader,
        'header-slider': SitePageHomeHeaderSlider,
        'header-banner': SitePageHomeHeaderBanner,
        'book-table': SitePageHomeBookTable
    },
    mounted() {
        var siteHeaderNavHeight = this.$el.querySelector('#site-header-nav').offsetHeight;
        var windowHeight = window.innerHeight;
        this.$el.querySelector('#site-page-home-header-banner').style.height = windowHeight - siteHeaderNavHeight +'px';
    }
}
</script>