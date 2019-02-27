<template>
    <section id="section-header">
        <slot name="site-header-background"></slot>
        <!-- Menu -->
        <site-header-nav></site-header-nav>
        <!-- slot - slider or  -->
        <slot name="site-header-banner"></slot>
    </section>
</template>

<style lang="scss" scoped>
    section#section-header {
        position: relative;
    }
</style>

<script>
import SiteHeaderNav from './SiteHeaderNav.vue'

export default {
    name: 'SiteHeader',
    components: {
        'site-header-nav': SiteHeaderNav
    }
}
</script>