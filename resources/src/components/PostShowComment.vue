<template>
    <div id="postShowComment">
        <article class="media comment parent-comment" v-for="comment in comments" :key="comment.id">
            <div class="media-right">
                <figure class="image is-64x64 is-1by1">
                    <a :href="href(comment)">
                        <img v-lazy="comment.user.avatar">
                    </a>
                </figure>
            </div>
            <div class="media-content">
                <div class="user-name">{{ comment.user.name }}</div>
                <div class="comment-content">{{ comment.content }}</div>
                <div class="comment-meta">
                    <span class="reply">Reply</span>
                    <span class="delimiter">-</span>
                    <span class="time">{{ [comment.created_at, "YYYY-MM-DD HH:mm:ss"] | moment('from', 'now') }}</span>
                </div>
                <article class="media comment child-comment" v-for="childComment in comment.child_comment" :key="childComment.id">
                    <div class="media-right">
                        <figure class="image is-64x64 is-1by1">
                            <a :href="href(comment)">
                                <img v-lazy="childComment.user.avatar">
                            </a>
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="user-name">{{ childComment.user.name }}</div>
                        <div class="comment-content">{{ childComment.content }}</div>
                        <div class="comment-meta">
                            <span class="reply">Reply</span>
                            <span class="delimiter">-</span>
                            <span class="time">{{ [childComment.created_at, "YYYY-MM-DD HH:mm:ss"] | moment('from', 'now') }}</span>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <!-- post comment : check for login -->
        <article class="media create-comment">
            <div class="media-right">
                <figure class="image is-64x64 is-1by1">
                    <img v-lazy="$root.author.avatar">
                </figure>
            </div>
            <div class="media-content">
                <form>
                    <div class="content">
                        <textarea name="comment" class="textarea" placeholder="Post a comment"></textarea>
                    </div>
                    <div class="submit">
                        <button class="button is-primary">Post Comment</button>
                    </div>
                </form>
            </div>
        </article>
    </div>
</template>

<style lang="scss" scoped>
    #postShowComment {
        padding: 10px 0;
        margin-bottom: 2rem;
        background-color: #fff;
        .media.comment {
            .media-right {
                padding-right: 20px;
                border-right: 1px solid saddlebrown;
                margin: 10px;
            }
            .media-content {
                padding: 10px 20px;
                .user-name {
                    font-weight: bold;
                    border-bottom: 1px solid #8b593cab;
                    padding-bottom: 10px;
                    color: #000;
                }
                .comment-content {
                    padding-top: 10px;
                }
                .comment-meta {
                    padding-top: 5px;
                    padding-bottom: 10px;
                    font-size: 13px;
                    span.reply {
                        color: rgb(40, 82, 129);
                    }
                    span.delimiter {
                        margin: 0 5px;
                        color: #000;
                    }
                    span.time {
                        color: #adadad;
                    }
                }
            }
        }
        .media.create-comment {
            .media-right{
                margin-left: 10px;
                padding-right: 20px;
            }
            .media-content {
                padding-right: 20px;
                .submit {
                    margin-top: 20px;
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'PostShowComment',
    computed: {
        comments() { return this.$root.comments },
    },
    methods: {
        href(comment) { return location.origin + '/user/show/' + comment.user.id}
    }
}
</script>
