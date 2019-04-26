<template>
    <section id="sitePageCartBody">
        <div class="cart-empty" v-if="!isActivate">
            <div>Your cart is Empty!</div>
            <div>
                <a :href="$root.routes.productIndex" class="button btn-brown btn-large">Continue Shopping</a>
            </div>
        </div>
        <div class="cart" v-if="isActivate">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in cart" :key="item.id">

                        <td class="thumbnail-col">
                            <div class="thumbnail">
                                <figure class="image is-1by1">
                                    <img v-lazy="item.options.thumbnail">
                                </figure>
                            </div>
                        </td>

                        <td class="name-col">
                            <span>{{ item.name }}</span>
                        </td>

                        <td class="price-col">
                            <span class="price">${{ item.price }}</span>
                        </td>

                        <td class="quantity-col">
                            <div class="quantity">
                                <div class="field">
                                    <div class="control">
                                        <input 
                                            type="number" 
                                            v-model="form[item.rowId]" 
                                            class="input" 
                                            @change="disabled = false">
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="total-col">
                            <span class="total">${{ item.subtotal }}</span>
                        </td>
                        
                        <td class="action-col">
                            <button class="button is-danger" @click="remove(item.rowId)">Remove</button>
                        </td>

                    </tr>
                </tbody>
            </table>

            <div class="columns action-row">
                <div class="column coupon">
                    <div class="field has-addons">
                        <div class="control">
                            <input type="text" v-model="couponForm.coupon" class="input" placeholder="Enter coupon">
                        </div>
                        <div class="control">
                            <button class="button btn-brown">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="column update">
                    <button class="button btn-brown btn-large" :disabled="disabled" @click="updateCart">Update Cart</button>
                </div>
            </div>

            <div class="total-checkout columns">
                <div class="column">
                    <div class="subtotal title is-4"><span>Subtotal</span>${{ subtotal }}</div>
                    <div class="total title is-1"><span>Total</span>${{ total }}</div>
                </div>
                <div class="column checkout">
                    <button class="button btn-brown">Proceed to checkout</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SitePageCartBody',
    data() {
        return {
            couponForm: new Form({
                coupon: ''
            }),
            disabled: true,
        }
    },
    computed: {
        cart() { return this.$root.cart },
        isActivate() {
            return this.cart.length > 0 ? true : false
        },
        form() {
            let data = {}
            this.cart.forEach(item => {
                data[item.rowId] = item.qty
            })
            return new Form(data)
        },
        subtotal() {
            let subtotal = 0
            this.cart.forEach(item => {
                subtotal += item.qty*item.price
            })
            return subtotal
        },
        total() {
            let total = 0
            this.cart.forEach(item => {
                total += item.qty*item.price
            })
            return total
        }
    },
    methods: {
        updateCart() {
            this.form.put('/api/cart/update')
                    .then(response => {
                        this.$root.cart = Object.values(response)
                    })
                    .catch(error => {
                        console.log(error)
                    })
        },
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
    #sitePageCartBody {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 100px 0;
        .cart-empty {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            div:first-child {
                margin-bottom: 30px;
                font-size: 30px;
                font-weight: bold;
                font-family: 'aileron'
            }
        }
        .cart {
            .cart-table {
                thead {
                    th {
                        background-color: #c0aa83;
                        color: #fff;
                        font-family: 'aileron-black';
                        padding: 20px 28px;
                        font-size: 1.5rem;
                        text-align: center;
                        min-width: 250px;
                    }
                }
                tbody {
                    tr  {
                        &:nth-child(even) {
                            td {
                                background-color: #f6f6f6;
                            }
                        }
                        td {
                            padding: 40px 15px;
                            text-align: center;
                        }
                    }
                    .thumbnail-col {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        .thumbnail {
                            width: 75px;
                        }
                    }
                    .name-col {
                        color: #000;
                        font-family: 'aileron-black';
                        font-weight: bold;
                        text-align: start;
                        font-size: 1rem;
                    }
                    .price-col,.total-col {
                        span{
                            color: #c0aa83;
                            font-size: 1.5rem;
                            font-family: 'aileron-black';
                            width: 200px;
                        }
                    }
                    .quantity-col {
                        .field {
                            width: 50px;
                            margin: 0 auto;
                        }
                    }
                }
            }
        }
        .action-row {
            padding: 30px 0 !important;
            .update {
                text-align: end;
            }
        }
        .total-checkout {
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-end;
            margin-top: 50px !important;
            .column {
                padding: 20px 0 !important;
            }
            .total,.subtotal {
                color: #000;
                span {
                    margin-right: 50px;
                    font-family: 'aileron-black';
                }
            }
            .checkout {
                button {
                    width: 250px;
                    height: 60px;
                }
            }
        }

    }
</style>