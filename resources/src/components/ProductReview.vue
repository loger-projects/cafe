<template>
    <div id="productReview">
        <div class="reviews">
            <product-review-item v-for="review in reviews" :key="review.id" :review="review"></product-review-item>
        </div>
        <product-review-form></product-review-form>
    </div>
</template>

<script>
import ProductReviewItem from './ProductReviewItem.vue'
import ProductReviewForm from './ProductReviewForm.vue'

export default {
    name: 'ProductReview',
    components: {
        ProductReviewItem,
        ProductReviewForm
    },
    computed: {
        reviews() { return this.$root.reviews }
    }
}
</script>

<style lang="scss">
    #productReview {
        .reviews {
            .media.review-item {
                .media-left {
                    border-right: 1px solid #000;
                    padding-right: 20px;
                    margin-right: 0;
                    margin-left: 10px;
                    .image {
                        margin: 0 !important;
                    }
                }
                .media-content {
                    padding: 10px 20px;
                    .user-name {
                        font-weight: bold;
                        border-bottom: 1px solid #000;
                        padding-bottom: 10px;
                        color: #000;
                    }
                    .rating {
                        padding: 7px 10px;
                    }
                    .review-content {
                        padding-top: 10px;
                    }
                }
            }
        }
    }
</style>