<template>
    <div class="categories widget">
        <div class="widget-title"><span>Categories</span></div>
        <div class="widget-content">
            <div class="item" v-for="category in categories" :key="category.id">
                <a class="item-title" :href="category.url">
                    {{ category.name }} (<span>{{ category.count }}</span>)
                </a> 
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostSidebarCategories',
    computed: {
        categories() { return this.$root.categories}
    }
}
</script>

<style lang="scss" scoped>
    .widget.categories {
        .widget-content {
            .item {
                padding: 10px 0;
                border-bottom: 1px solid #ddd;
                .item-title {
                    color: #666;
                    text-transform: uppercase;
                    font-weight: bold;
                    span {
                        color: #000;
                    }
                }
            }
        }
    }
</style>