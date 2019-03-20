<template>
    <div id="postShowRelate">
        <div class="title is-4">Related Posts</div>
        <div class="content">
            <carousel
                :perPageCustom="[[300, 1],[480,2], [768,3], [1216, 4], [1400, 5]]"
                ease="ease-in-out"
                :paginationEnabled="false"
                :navigationEnabled="false">
                <slide v-for="post in posts" :key="post.id">
                    <post-show-item :post="post"></post-show-item>
                </slide>
            </carousel>
        </div>
    </div>
</template>

<style lang="scss">
    #postShowRelate {
        background-color: #fff;
        margin-bottom: 2rem;
        .title {
            color: #000;
            margin: 0;
            padding: 10px;
            border-bottom: 1px solid rgb(170, 124, 92);
        }
        .content {
            .post-show-item {
                padding: 20px 10px;
                .article-head {
                    figure.image {
                        margin: 0 !important;
                    }
                }
                .article-body {
                    .post-title.title {
                        font-size: 1.25rem;
                    }
                    .post-meta {
                        font-size: 13px;
                        padding: 10px 0;
                        border-bottom: 1px solid rgb(170, 124, 92);
                    }
                }
            }
        }

    }
</style>

<script>
import PostShowItem from './PostShowItem.vue'

export default {
    name: 'PostShowRelate',
    components: {
        PostShowItem
    },
    computed: {
        posts() { return this.$root.relatedPosts }
    }
}
</script>