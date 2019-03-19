<template>
    <div id="postShowMeta">
        <span class="item">
            <span><strong>Published By:&nbsp;&nbsp;</strong></span>
            <span class="item-value"><a :href="linkToUserShow($root.author.id)">{{ $root.author.name }}</a></span>
        </span>
        <span class="item">
            <span><strong>Published At:&nbsp;&nbsp;</strong></span>
            <span class="item-value">{{ [$root.post.created_at, "YYYY-MM-DD HH:mm:ss"] | moment('from', 'now') }}</span>
        </span>
        <span class="item">
            <span><strong>Comments:&nbsp;&nbsp;</strong></span>
            <span class="item-value">{{ $root.post.comment_count }}</span>
        </span>
    </div>
</template>

<style lang="scss" scoped>
    #postShowMeta {
        background-color: #fff;
        margin-bottom: 2rem;
        padding-left: 0.5rem 0 0.5rem 30px;
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
    methods: {
        linkToUserShow(id) { return location.origin + '/user/show/' + id }
    }
}
</script>
