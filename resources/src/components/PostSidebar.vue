<template>
    <aside id="postSidebar">
        <div id="sidebar">
            <sidebar-categories></sidebar-categories>
            <sidebar-recent-posts></sidebar-recent-posts>
            <sidebar-galleries></sidebar-galleries>
        </div>
    </aside>
</template>

<script>
import SidebarCategories from './SidebarCategories.vue'
import SidebarRecentPosts from './SidebarRecentPosts.vue'
import SidebarGalleries from './SidebarGalleries.vue'

export default {
    name: 'PostSidebar',
    components: {
        SidebarCategories,
        SidebarRecentPosts,
        SidebarGalleries
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
                        color: #000;
                        font-size: 1.5rem;
                    }
                }
            }
        }
    }
</style>