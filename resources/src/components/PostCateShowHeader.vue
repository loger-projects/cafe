<template>
    <section id="postCateShowHeader">
        <site-header-style-large
            :backgroundURL="$root.headerBackgroundURL"
            :activeHeroFoot="false"
            :isTitleStrong="true"
            :title="category.name"
            :description="category.description"
        ></site-header-style-large>
    </section>
</template>

<script>
import SiteHeaderStyleLarge from './SiteHeaderStyleLarge.vue'

export default {
    name: 'PostCateShowHeader',
    components: {
        SiteHeaderStyleLarge
    },
    computed: {
        category() { return this.$root.category }
    }
}
</script>
