<template>
    <div id="sitePageCheckoutBody">
        <div class="container">
            <div id="checkoutForm">
                <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" id="submitInfoForm">
                    <div class="columns">
                        <div class="column">
                            <h1 class="title is-aileron-black">Billing Details</h1>

                            <div class="field">
                                <div class="control">
                                    <label for="name" class="label">Name<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="name"
                                        :class="{'input': true, 'is-danger': form.errors.has('name')}"
                                        v-model="form.name">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('name')">
                                    {{ form.errors.get('name') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="email" class="label">Email<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="email" 
                                        name="email"
                                        :class="{'input': true, 'is-danger': form.errors.has('email')}"
                                        v-model="form.email">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('email')">
                                    {{ form.errors.get('email') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="phone" class="label">Phone<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="phone"
                                        :class="{'input': true, 'is-danger': form.errors.has('phone')}"
                                        v-model="form.phone">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('phone')">
                                    {{ form.errors.get('phone') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="street_address" class="label">Street address<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="street_address"
                                        :class="{'input': true, 'is-danger': form.errors.has('street_address')}"
                                        v-model="form.street_address">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('street_address')">
                                    {{ form.errors.get('street_address') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="city" class="label">City<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="city"
                                        :class="{'input': true, 'is-danger': form.errors.has('city')}"
                                        v-model="form.city">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('city')">
                                    {{ form.errors.get('city') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="country" class="label">Country<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="country"
                                        :class="{'input': true, 'is-danger': form.errors.has('country')}"
                                        v-model="form.country">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('country')">
                                    {{ form.errors.get('country') }}
                                </p>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="zipcode" class="label">Zipcode<span class="has-text-danger">*</span></label>
                                    <input 
                                        type="text" 
                                        name="zipcode"
                                        :class="{'input': true, 'is-danger': form.errors.has('zipcode')}"
                                        v-model="form.zipcode">
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('zipcode')">
                                    {{ form.errors.get('zipcode') }}
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <h1 class="title is-aileron-black">Additional Infomation</h1>

                            <div class="field">
                                <div class="control">
                                    <label for="order_note" class="label">Order note (optional)</label>
                                    <textarea 
                                        name="order_note"
                                        placeholder="Notes about your order, e.g. special notes for delivery"
                                        :class="{'textarea': true, 'is-success': form.errors.any()}"
                                        v-model="form.order_note">
                                    </textarea>
                                </div>
                                <p class="help is-danger" v-if="form.errors.has('order_note')">
                                    {{ form.errors.get('order_note') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="checkoutCart">
                <h1 class="title is-aileron-black">Your order</h1>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <td>Product</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in cart" :key="item.id">
                            <td class="name-col"><span>{{ item.name }} x {{ item.qty }}</span></td>
                            <td class="total-col"><span>${{ item.subtotal }}</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="subtotal-row">
                            <td>Subtotal</td>
                            <td>${{ subtotal }}</td>
                        </tr>
                        <tr class="total-row">
                            <td>Total</td>
                            <td>${{ total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div id="checkoutTranser"></div>
            <div id="placeOrder">
                <button type="submit" class="button btn-brown" form="submitInfoForm" :disabled="form.errors.any()">Place order</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SitePageCheckoutBody',
    data() {
        return {
            form: new Form({
                name: '',
                email: '',
                phone: '',
                street_address: '',
                city: '',
                country: '',
                zipcode: '',
                order_note: ''
            })
        }
    },
    computed: {
        cart() { return this.$root.cart },
        user() { return this.$root.user },
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
        onSubmit() {
            this.form.post('/api/order/store')
                    .then(response => {
                        if(response.data) {
                            location.href = this.$root.routes.sitePageCheckoutEnd
                        }
                    })
        },
       
    },
}
</script>

<style lang="scss" scoped>
    #sitePageCheckoutBody {
        #checkoutForm {
            padding: 30px 0;
            .column {
                padding: 0 20px !important;
            }
        }
        #checkoutCart {
            .cart-table {
                display: block;
                tr {
                    display: flex;
                    td:first-child {
                        width: 80%;
                    }
                    td:last-child {
                        width: 20%;
                    }
                }
                thead {
                    width: 100%;
                    display: block;
                    tr {
                        td {
                            background-color: #c0aa83;
                            color: #fff;
                            font-family: 'aileron-black';
                            padding: 20px 28px;
                            font-size: 1.5rem;
                            text-align: center;
                        }
                    }
                }
                tbody {
                    display: block;
                    border-bottom: 2px solid #000;
                    tr:nth-child(odd) {
                        background-color: #f6f6f6;
                    }
                    tr {
                        td:first-child {
                            color: #000;
                            font-family: 'aileron-black'
                        }
                        td {
                            padding: 10px 20px;
                            border: 1px solid #f2f2f2;
                        }
                    }
                }
                tfoot {
                    display: block;
                    tr {
                        td {
                            color: #000;
                            font-family: 'aileron-black';
                            padding: 10px 20px;
                            &:first-child {
                                text-align: end;
                                background-color: #f6f6f6;
                            }
                        }
                        &.total-row {
                            font-size: 30px;
                        }
                    }
                }
            }
        }
        #placeOrder {
            padding: 20px 10px;
            margin-top: 20px;
            text-align: end;
            border-top: 1px solid #757575;
            button {
                height: 60px;
                width: 150px;
            }
        }
    }
</style>