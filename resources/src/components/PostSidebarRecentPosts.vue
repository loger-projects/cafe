<template>
    <div class="recent-posts widget">
        <div class="widget-title"><span>Recent Posts</span></div>
        <div class="widget-content">
            <div class="item" v-for="post in posts" :key="post.id">
                <a class="item-title" :href="post.url">{{ post.title }}</a>
                <div class="item-footer">
                    <span>{{ [post.created_at] | moment("MMMM D, YYYY") }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostSidebarRecentPosts',
    props: ['posts']
}
</script>

<style lang="scss" scoped>
    .widget.recent-posts {
        .widget-content {
            .item {
                margin-bottom: 10px;
                .item-title {
                    color: #2a2a2a;
                }
                .item-footer {
                    padding-left: 15px;
                    span {
                        color: #666;
                        font-style: italic;
                        font-size: 0.75rem;
                    }

                }
            }
        }
    }
</style>