<template>
    <div id="site-header-nav">
        <site-header-nav-desktop-nav></site-header-nav-desktop-nav>
        <site-header-nav-mobie-nav></site-header-nav-mobie-nav>
    </div>
</template>


<script>
import SiteHeaderNavDesktopNav from './SiteHeaderNavDesktopNav.vue'
import SiteHeaderNavMobieNav from './SiteHeaderNavMobieNav.vue'

export default {
    name: 'SiteHeaderNav',
    components: {
        'site-header-nav-desktop-nav': SiteHeaderNavDesktopNav,
        'site-header-nav-mobie-nav': SiteHeaderNavMobieNav
    },
    data() {
        return {
            links: [ // get this from ajax
                {title: 'Home', href: '#', isActive: false},
                {title: 'About Us', href: '#', isActive: false},
                {title: 'Offer', href: '#', isActive: false},
                {title: 'Menu', href: '#', isActive: false},
                {title: 'Team', href: '#', isActive: false},
                {title: 'Blog', href: '#', isActive: false},
                {title: 'Gallery', href: '#', isActive: false}
            ]
        }
    }
}
</script>