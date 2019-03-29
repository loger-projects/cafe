<template>
    <section id="postCateShowBody">
        <div class="container">
            <div class="columns">
                <div class="column is-9 main">
                    <div class="post-list">
                        <post-index-item v-for="post in posts" :key="post.id" :post="post"></post-index-item>
                    </div>
                    <b-pagination
                        :total="pagination.total"
                        :current.sync="pagination.current_page"
                        order="is-centered"
                        :rounded="true"
                        :per-page="5"
                        icon-pack="fas"
                        @change="pageChange"
                    ></b-pagination>
                </div>
                <div class="column is-3 sidebar">
                    <post-sidebar></post-sidebar>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import PostIndexItem from './PostIndexItem.vue'
import PostSidebar from './PostSidebar.vue'

export default {
    name: 'PostCateShowBody',
    components: {
        PostIndexItem,
        PostSidebar
    },
    computed: {
        posts() { return this.$root.posts },
        pagination() { return this.$root.pagination }
    },
    methods: {
        pageChange(page) {
            let str = location.href.replace('/post/', '/api/post/');
            axios.get(str + '?page=' + page)
                .then(response => {

                     this.$root.posts = response.data.posts.data

                     delete response.data.posts.data

                     this.$root.pagination = response.data.posts
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        }
    }

}
</script>

<style lang="scss">
    #postCateShowBody {
        padding: 90px 0 50px 0;
        .main {
            padding: 0 20px !important;
            .post-list {
                .post-item {
                    margin-bottom: 50px;
                    padding-bottom: 50px;
                    padding-right: 100px;
                    border-bottom: 1px solid #ddd;
                    .article-head {
                        margin-bottom: 25px;
                        .image {
                            margin: 0;
                        }
                    }
                    .article-body {
                        .post-title {
                            margin-bottom: 20px;
                            a {
                                color: #000;
                                &:hover {
                                    color: #ffb606;
                                }
                            }
                        }
                        .post-meta {
                            margin-bottom: 20px;
                            .item {
                                margin-right: 20px;
                            }
                        }
                    }
                }
            }
        }
        .sidebar {
            padding: 0 20px;
        }
    }
</style>