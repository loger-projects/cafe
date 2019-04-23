<template>
    <div id="productShowItem">
        <div class="alert-success has-text-success" v-if="isSuccess">
            <div class="message-content">
                <span class="icon is-medium"><i class="fas fa-check circle"></i></span><strong class="product-name">“{{ product.name }}”</strong> has been added to your cart.
            </div>
            <div class="button-wrap">
                <a :href="routes.cart" class="button btn-brown btn-large">View Cart</a>
            </div>
            <div class="delete" @click="isSuccess = false"></div>
        </div>
        <div class="columns is-multiline">
            <div class="column is-6-tablet is-5-desktop product-images">
                <figure class="image is-1by1">
                    <img v-lazy="product.thumbnail">
                </figure>
            </div>
            <div class="column is-6-tablet is-5-desktop product-content">
                <h2 class="title is-3 product-title">{{ product.name }}</h2>
                <div class="product-rating">
                    <star-rating 
                        :rating="product.rating" 
                        :read-only="true" 
                        active-color="#000" 
                        border-color="#000"
                        :star-size="20">
                    </star-rating>
                    <div class="rating_count">({{ product.rating_count }})</div>
                </div>
                <div class="product-price">${{ product.price }}</div>
                <div class="product-description">{{ product.excerpt }}</div>
                <div class="add-to-cart-wrapper">
                    <div class="quantity field">
                        <div class="control">
                            <input type="number" class="input" v-model="qty" min="1" max="10">
                        </div>
                    </div>
                    <div class="add-to-cart-button">
                        <button class="button btn-brown btn-medium" @click="addToCart">Add To Cart</button>
                    </div>
                </div>
                <div class="product-category">
                    <strong>Category:</strong>
                    <a :href="category.url"><span>{{ category.name }}</span></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductShowItem',
    data() {
        return {
            qty: 1,
            isSuccess: false
        }
    },
    computed: {
        product() { return this.$root.product },
        category() { return this.$root.product_category },
        routes() {
            return {
                cart: location.origin + '/cart'
            }
        }
    },
    methods: {
        addToCart() {
            axios.post('/api/cart/add', {
                product: this.product,
                qty: this.qty
            }).then(response => {
                this.$root.cart = Object.values(response.data)
                this.qty = 1
                this.isSuccess = true
            }).catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    #productShowItem {
        .alert-success {
            border: 1px solid rgb(40, 189, 65);
            border-top: 5px solid rgb(40, 189, 65);
            padding: 15px 10px;
            background-color: #f8f8f8;
            display: flex;
            align-items: center;
            .product-name {
                margin: 0 8px 0 15px;
            }
            .button-wrap {
                margin-left: auto;
                margin-right: 15px;
            }
        }
        .product-images {
            img {
                width: 100%;
            }
        }
        .product-content {
            padding: 0 20px !important;
            .product-title {
                margin-bottom: 1rem;
            }
            .product-rating {
                display: flex;
                align-items: center;
                .rating_count {
                    padding-left: 10px;
                }
            }
            .product-price {
                color: #795f4b;
                font-weight: bold;
                font-family: 'aileron-black';
                font-size: 30px;
                margin-bottom: 20px;
            }
            .product-description {
                margin-bottom: 20px;
            }
            .add-to-cart-wrapper {
                margin-bottom: 20px;
                display: flex;
                .quantity {
                    width: 50px;
                }
                .add-to-cart-button {
                    padding-left: 20px;
                    font-weight: bold;
                }
            }
            .product-category {
                span {
                    padding-left: 1rem;
                    color: #795f4b;
                }
            }
        }
    }
</style>
