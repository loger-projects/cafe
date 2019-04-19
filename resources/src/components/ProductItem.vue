<template>
    <article class="product-item article column is-half is-one-third-desktop">
        <div class="article-head">
            <figure class="image is-1by1 product-thumbnail">
                <img v-lazy="product.thumbnail">
            </figure>
        </div>
        <div class="article-body">
            <div class="entry-head">
                <h2 class="title"><a :href="product.url">{{ product.name }}</a></h2>
            </div>
            <div class="entry-body">
                <p class="description">{{ product.description.substr(0, 75) }}</p>
            </div>
            <div class="entry-foot">
                <div class="price">${{ product.price }}</div>
                <button class="button add-to-cart-button" @click="addToCart">
                    <span class="icon is-small"><i class="fas fa-shopping-cart"></i></span>
                    Add to cart
                </button>
            </div>
        </div>
    </article>
</template>

<script>
export default {
    name: 'ProductItem',
    props: ['product'],
    methods: {
        addToCart() {
            axios.post('/api/cart/add', {
                product: this.product,
                qty: 1
            }).then(response => {
                this.$root.cart = Object.values(response.data)
            }).catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>