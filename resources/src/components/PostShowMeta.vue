<template>
    <div id="postShowMeta">
        <span class="item">
            <span class="post-meta--item icon is-small"><i class="fas fa-user"></i>&nbsp;&nbsp;</span>
            <span class="item-value"><a :href="linkToUserShow(author.id)">{{ author.name }}</a></span>
        </span>
        <span class="item">
            <span class="post-meta--item icon is-small"><i class="fas fa-comments"></i>&nbsp;&nbsp;</span>
            <span class="item-value">{{ $root.post.comment_count }}</span>
        </span>
        <span class="item">
            <span class="post-meta--item icon is-small"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;</span>
            <span class="item-value">{{ [post.created_at] | moment("YYYY MMMM DD HH:mm:ss") }}</span>
        </span>
    </div>
</template>

<style lang="scss" scoped>
    #postShowMeta {
        background-color: #fff;
        margin-bottom: 2rem;
        padding: 0.5rem 0 0.5rem 30px;
        .item {
            margin-right: 30px;
            .item-value {
                color: #493d22;
                a {
                    color: #493d22;
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'PostShowMeta',
    computed: {
        author() { return this.$root.author },
        post() { return this.$root.post }
    },
    methods: {
        linkToUserShow(id) { return location.origin + '/user/show/' + id }
    }
}
</script>
