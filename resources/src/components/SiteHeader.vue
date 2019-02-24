<template>
    <section id="section-header">
        <slot name="site-header-bg-slot"></slot>
        <!-- Menu -->
        <site-header-nav></site-header-nav>
        <!-- slot - slider or  -->
        <slot name="site-header-banner-slot"></slot>
    </section>
</template>

<script>
import SiteHeaderNav from './SiteHeaderNav.vue'

export default {
    name: 'SiteHeader',
    components: {
        'site-header-nav': SiteHeaderNav
    }
}
</script>