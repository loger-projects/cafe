<template>
    <div id="postShow">
        <!-- navigator - title - thumbnail - breadcrumb -->
        <post-show-header></post-show-header> 
        <!-- content - sidebar - comment-->
        <post-show-body></post-show-body>
        <!-- footer -->
        <site-footer></site-footer>
    </div>
</template>

<style lang="scss" scoped>
    
</style>

<script>
import PostShowHeader from '../components/PostShowHeader.vue'
import PostShowBody from '../components/PostShowBody.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'PostShow',
    components: {
        PostShowHeader,
        PostShowBody,
        SiteFooter
    }
}
</script>
