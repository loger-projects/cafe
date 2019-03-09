<template>
    <div id="sitePageHome">
        <site-home-header></site-home-header>
        <site-home-book-table></site-home-book-table>
        <site-home-menu></site-home-menu>
        <site-home-news></site-home-news>
        <site-home-product></site-home-product>
        <site-home-about-us></site-home-about-us>
        <site-footer></site-footer>
    </div>
</template>

<style lang="scss" scoped>
    
</style>

<script>
import SitePageHomeHeader from '../components/SitePageHomeHeader.vue'
import SitePageHomeBookTable from '../components/SitePageHomeBookTable.vue'
import SitePageHomeMenu from '../components/SitePageHomeMenu.vue'
import SitePageHomeNews from '../components/SitePageHomeNews.vue'
import SitePageHomeProduct from '../components/SitePageHomeProduct.vue'
import SitePageHomeAboutUs from '../components/SitePageHomeAboutUs.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'SitePageHome',
    components: {
        'site-home-header': SitePageHomeHeader,
        'site-home-book-table': SitePageHomeBookTable,
        'site-home-menu': SitePageHomeMenu,
        'site-home-news': SitePageHomeNews,
        'site-home-product': SitePageHomeProduct,
        'site-home-about-us': SitePageHomeAboutUs,
        'site-footer': SiteFooter
    },
}
</script>