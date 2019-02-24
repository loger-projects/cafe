<template>
    <div id="site-page-home-container">
        <site-header>
            <template slot="site-header-banner-slot">
                <div>
                    Site Header Slot
                </div>
            </template>
        </site-header>
    </div>
</template>

<script>
import SiteHeader from '../components/SiteHeader.vue'

export default {
    name: 'SitePageHome',
    components: {
        'site-header': SiteHeader
    }
}
</script>