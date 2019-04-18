<template>
    <div class="cart widget" id="productSidebarCart">
        <div class="widget-title">
            <span>Cart</span>
        </div>
        <div class="widget-content">
            <div class="item">
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SidebarCart',
    computed: {
        carts() { return this.$root.carts }
    }
}
</script>