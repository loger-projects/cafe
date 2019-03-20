<template>
    <div id="postShowRelate">
        <div class="title is-4">Related Posts</div>

    </div>
</template>

<style lang="scss" scoped>
    #postShowRelate {
        background-color: #fff;
        margin-bottom: 2rem;
    }
</style>

<script>
export default {
    name: 'PostShowRelate',
    computed: {
        posts() { return this.$root.relatedPosts }
    }
}
</script>