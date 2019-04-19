<template>
    <div id="productShowDetail">
        <div class="button-wrap">
            <a :class="{'button': true, 'is-active': active, 'btn-brown': !active}" @click="active = true" role="button">Description</a>
            
            <a :class="{'button': true, 'is-active': !active, 'btn-brown': active}" @click="active = false" role="button">Reviews</a>
        </div>
        <div class="content">
            <div class="description" v-if="active">
                <h2 class="title is-aileron-bold">Description</h2>
                {{ product.description }}
            </div>
            <div class="reviews" v-if="!active">
                <h2 class="title is-aileron-bold">Reviews</h2>
                <product-review></product-review>
            </div>
        </div>
    </div>
</template>

<script>
import ProductReview from './ProductReview.vue'

export default {
    name: 'ProductShowDetail',
    components: {
        ProductReview
    },
    data() {
        return {
            active: true
        }
    },
    computed: {
        product() { return this.$root.product }
    }
}
</script>

<style lang="scss" scoped>
    #productShowDetail {
        margin-top: 50px;
        .button-wrap {
            .button {
                font-weight: bold;
                width: 150px;
                height: 46px;
                border: none !important;
                border-radius: 0 !important;
                &.is-active {
                    background-color: #f6f6f6;
                    color: #000;
                }
            }
        }
        .content {
            padding: 25px 15px;
            background-color: #f6f6f6;
        }
    }
</style>
