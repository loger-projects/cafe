<template>
    <aside id="postSidebar">
        <div id="sidebar">
            <post-sidebar-categories :categories="categories"></post-sidebar-categories>
            <post-sidebar-recent-posts :posts="posts"></post-sidebar-recent-posts>
            <post-sidebar-galleries :galleries="galleries"></post-sidebar-galleries>
        </div>
    </aside>
</template>

<script>
import PostSidebarCategories from './PostSidebarCategories.vue'
import PostSidebarRecentPosts from './PostSidebarRecentPosts.vue'
import PostSidebarGalleries from './PostSidebarGalleries.vue'

export default {
    name: 'PostSidebar',
    components: {
        PostSidebarCategories,
        PostSidebarRecentPosts,
        PostSidebarGalleries
    },
    computed: {
        categories() { return this.$root.categories },
        posts() { return this.$root.latestPosts },
        galleries() { return this.$root.galleries }
    }
}
</script>

<style lang="scss">
    #postSidebar {
        padding: 0px 20px;
        #sidebar {
            background-color: #fff;
            padding: 20px 10px;
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
            }
        }
    }
</style>