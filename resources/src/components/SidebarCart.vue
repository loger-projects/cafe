<template>
    <div class="cart widget" id="productSidebarCart">
        <div class="widget-title">
            <span>Cart</span>
        </div>
        <div class="widget-content" v-if="cart.length == 0">
            <div class="cart-empty">There are no products in Cart</div>
        </div>
        <div class="widget-content" v-else>
            <div class="item" v-for="item in cart" :key="item.id">
                <div class="thumbnail">
                    <figure class="image is-1by1">
                        <img v-lazy="item.options.thumbnail">
                    </figure>
                </div>
                <div class="content">
                    <h3 class="title is-5">{{ item.name }}</h3>
                    <div><span class="quantity">{{ item.qty }} x</span>&nbsp;<span class="price">${{ item.price }}</span> </div>
                </div>
                <div class="delete-button">
                    <button class="delete" @click="remove(item.rowId)"></button>
                </div>
            </div>
            <div class="view-cart-button">
                <a :href="routes.cart" class="button btn-brown" role="button">View Cart</a>
            </div>
            <div class="checkout-button">
                <a :href="routes.checkout" class="button btn-black">Checkout</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SidebarCart',
    computed: {
        cart() { return this.$root.cart },
        subtotal() {
            let subtotal = 0;
            this.cart.forEach(element => {
                subtotal += element.subtotal
            });
            return subtotal;
        },
        routes() {
            return {
                cart: location.origin + '/cart',
                checkout: location.origin + '/checkout'
            }
        }
    },
    methods: {
        remove(rowId) {
            axios.post('/api/cart/remove', {
                rowId: rowId
            })
            .then(response => {
                this.$root.cart = Object.values(response.data)
            }).catch(error => {
                console.log(error.response.data)
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    #productSidebarCart {
        .widget-content {
            .cart-empty {
                text-align: center;
                color: #000;
                padding: 20px 0;
            }
            .item {
                display: flex;
                border-bottom: 1px solid rgb(102, 101, 101);
                padding: 10px 0;
                &:last-child {
                    border-bottom: none;
                }
                .thumbnail {
                    width: 75px;
                    padding-right: 15px;
                }
                .content {
                    flex: 1;
                    margin-bottom: 0;
                    h3.title {
                        margin-bottom: 10px;
                    }
                    div {
                        padding-left: 20px;
                        span.quantity {
                            color: #000;
                            font-weight: bold; 
                            font-size: 18px;
                        }
                        span.price {
                            color: #795f4b;
                            font-weight: bold;
                            font-size: 20px;
                            font-family: 'aileron-black';
                        }
                    }
                }
                .delete-button {
                    width: 50px;
                }
            }
            .view-cart-button {
                text-align: center;
                padding: 10px 0;
                .button {
                    width: 180px;
                    height: 45px;
                }
            }
            .checkout-button {
                text-align: center;
                .button {
                    width: 180px;
                    height: 45px;
                }
            }
        }
    }
</style>