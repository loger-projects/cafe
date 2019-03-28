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
    name: 'SidebarPosts',
    props: ['posts']
}
</script>

<style lang="scss" scoped>
    .widget {
        margin-bottom: 30px;
        .widget-title {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            &::before {
                content: '';
                display: block;
                position: absolute;
                top: 50%;
                left: 0;
                width: 100%;
                height: 1px;
                background: #ddd;
                z-index: 0;
            }
            span {
                text-transform: uppercase;
                background: #fff;
                position: relative;
                z-index: 1;
                padding: 0 5px;
            }
        }
        &.recent-posts {
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
    }
</style>