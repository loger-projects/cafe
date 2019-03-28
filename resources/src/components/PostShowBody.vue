<template>
    <section id="postShowBody">
        <!-- content - sidebar - comment -->
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-9">
                    <div id="main">
                        <post-show-meta></post-show-meta>
                        <div id="post-content">{{ post.content }}</div>
                        <post-show-author :authorID="post.user_id"></post-show-author>
                        <post-show-relate></post-show-relate>
                        <post-show-comment></post-show-comment>
                    </div>
                </div>
                <div class="column is-3">
                    <post-sidebar></post-sidebar>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #postShowBody {
        display: flex;
        background-color: #c2c2c2;
        padding-top: 50px;
        #main {
            #post-content {
                background-color: #fff;
                padding: 30px 20px;
                margin-bottom: 2rem;
            }
        }
    }
</style>

<script>
import PostShowMeta from './PostShowMeta.vue'
import PostShowAuthor from './PostShowAuthor.vue'
import PostShowRelate from './PostShowRelate.vue'
import PostShowComment from './PostShowComment.vue'
import PostSidebar from './PostSidebar.vue'

export default {
    name: 'PostShowBody',
    components: {
        PostShowMeta,
        PostShowAuthor,
        PostShowRelate,
        PostShowComment,
        PostSidebar
    },
    computed: {
        post() {
            return this.$root.post;
        }
    }
}
</script>