<template>
    <aside id="postSidebar">
        <div id="sidebar">
            <sidebar-categories :categories="categories"></sidebar-categories>
            <sidebar-posts :posts="posts"></sidebar-posts>
            <sidebar-galleries :galleries="galleries"></sidebar-galleries>
        </div>
    </aside>
</template>

<script>
import SidebarCategories from './SidebarCategories.vue'
import SidebarPosts from './SidebarPosts.vue'
import SidebarGalleries from './SidebarGalleries.vue'

export default {
    name: 'PostSidebar',
    components: {
        SidebarCategories,
        SidebarPosts,
        SidebarGalleries
    },
    computed: {
        categories() { return this.$root.categories },
        posts() { return this.$root.latestPosts },
        galleries() { return this.$root.galleries }
    }
}
</script>

<style lang="scss" scoped>
    #postShowSidebar {
        padding: 0px 20px;
        #sidebar {
            background-color: #fff;
            padding: 20px 10px;
        }
    }
</style>