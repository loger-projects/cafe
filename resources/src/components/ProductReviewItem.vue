<template>
    <article class="review-item media">
        <div class="media-left">
            <figure class="image is-64x64 is-1by1">
                <img v-lazy="review.user.avatar">
            </figure>
        </div>
        <div class="media-content">
            <div class="user-name">{{ review.user.name }}</div>
            <div class="rating"><star-rating :rating="review.rating" :read-only="true" active-color="#000" border-color="#000" :star-size="20"></star-rating></div>
            <div class="review-content">
                {{ review.content }}
            </div>
        </div>
    </article>
</template>

<script>
export default {
    name: 'ProductReviewItem',
    props: ['review']
}
</script>
