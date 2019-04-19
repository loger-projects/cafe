<template>
    <div id="postIndex">
        <post-index-header></post-index-header>
        <post-index-body></post-index-body>
        <site-footer></site-footer>
    </div>
</template>

<script>
import PostIndexHeader from '../components/PostIndexHeader.vue'
import PostIndexBody from '../components/PostIndexBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'PostIndex',
    components: {
        PostIndexHeader,
        PostIndexBody,
        SiteFooter
    }
}
</script>
