<template>
    <div id="productShowRelated">
        <h2 class="title is-aileron-black">Related Products</h2>
        <div class="columns is-multiline">
            <product-item v-for="product in relatedProducts" :key="product.id" :product="product"></product-item>
        </div>
    </div>
</template>

<script>
import ProductItem from './ProductItem.vue'

export default {
    name: 'ProductShowRelated',
    components: {
        ProductItem
    },
    computed: {
        relatedProducts() { return this.$root.relatedProducts }
    }
}
</script>

<style lang="scss">
    #productShowRelated {
        margin: 20px 0;
        .product-item.article {
            padding: 0 30px 20px 30px!important;
            transition: 300ms;
            &:hover {
                box-shadow: 0px 0px 4px #795f4b
            }
            .article-head {
                padding: 20px;
                img {
                    width: 100%;
                }
            }
            .article-body {
                .entry-head {
                    text-align: center;
                    margin-bottom: 20px;
                    h2 {
                        a {
                            color: #000;
                            &:hover {
                                color: #795f4b;
                            }
                        }
                    }
                }
                .entry-body {
                    text-align: center;
                }
                .entry-foot {
                    text-align: center;
                    .price {
                        color: #000;
                        font-size: 30px;
                        font-weight: bold;
                        margin-top: 20px;
                    }
                    .button.add-to-cart-button {
                        width: 180px;
                        height: 45px;
                        background-color: #795f4b;
                        color: #fff;
                        font-weight: bold;
                        margin-top: 20px;
                        &:hover {
                            background-color: #000;
                        }
                        span {
                            margin-right: 15px;
                        }
                    }
                }
            }
        }
    }
</style>