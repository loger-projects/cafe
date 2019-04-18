<template>
    <div id="productSidebar">
        <sidebar-cart></sidebar-cart>
        <sidebar-categories></sidebar-categories>
        <sidebar-galleries></sidebar-galleries>
    </div>
</template>

<script>
import SidebarCart from './SidebarCart.vue'
import SidebarCategories from './SidebarCategories.vue'
import SidebarGalleries from './SidebarGalleries.vue'

export default {
    name: 'ProductSidebar',
    components: {
        SidebarCart,
        SidebarCategories,
        SidebarGalleries
    },
}
</script>

<style lang="scss">
    #productSidebar {
        padding: 10px 20px;
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
    
</style>
