<template>
    <section id="postIndexheader">
        <site-header-style-large
            :backgroundURL="$root.headerBackgroundURL"
            :activeHeroFoot="false"
            :isTitleStrong="true"
            title="Blog"
            description="LECTORES LEGERE"
        >
        </site-header-style-large>
    </section>
</template>

<script>
import SiteHeaderStyleLarge from './SiteHeaderStyleLarge.vue'

export default {
    name: 'postIndexHeader',
    components: {
        SiteHeaderStyleLarge
    }
}
</script>