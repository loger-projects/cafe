<template>
    <section id="sitePageCartBody">
        <div class="cart-empty"></div>
        <div class="cart">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in cart" :key="item.id">
                        <th></th>
                        <td>
                            <figure class="image is-1by1">
                                <img v-lazy="item.thumbnail">
                            </figure>
                        </td>
                        <td>
                            <h2 class="title">{{ item.name }}</h2>
                        </td>
                        <td>
                            <span class="price">{{ item.price }}</span>
                        </td>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <input type="number" :value="item.qty">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="total">{{ item.subtotal }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SitePageCartBody',
    computed: {
        cart() { return this.$root.cart },
        qty() {
            item
        }
    }
}
</script>
