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
    name: 'SidebarCategories',
    props: ['categories']
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
        &.categories {
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
    }
</style>