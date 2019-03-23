<template>
    <div id="postShowComment">
        <comment-item 
            v-for="comment in comments" 
            :key="comment.id" 
            :inputComment="comment">
        </comment-item>
        <!-- button -->
        <div class="show-reply-form" v-if="!showReplyForm">
            <button class="button is-primary" @click="showReplyForm = true">Create a Comment</button>
        </div>
        <comment-reply 
            v-if="showReplyForm"
            :closeButton="false"
            :isRootComment="true"
            :parentID="null">
        </comment-reply>
    </div>
</template>

<style lang="scss">
    #postShowComment {
        padding: 10px 0;
        margin-bottom: 2rem;
        background-color: #fff;
        .media.comment {
            .media-left {
                border-right: 1px solid saddlebrown;
                padding-right: 20px;
                margin-right: 0;
                margin-left: 10px;
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
                        cursor: pointer;
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
            .media-left {
                margin-left: 10px;
                padding-right: 20px;
                margin-right: 0;
                border-right: 1px solid saddlebrown;
            }
            .media-content {
                padding: 0 20px;
                .submit {
                    margin-top: 20px;
                }
            }
            .media-right {
                margin-left: 0;
            }
        }
        .show-reply-form {
            padding: 10px 0 10px 90px;
        }
    }
</style>

<script>
import PostShowCommentItem from './PostShowCommentItem.vue'
import PostShowCommentReply from './PostShowCommentReply.vue'

export default {
    name: 'PostShowComment',
    components: {
        'comment-item': PostShowCommentItem,
        'comment-reply': PostShowCommentReply
    },
    data() {
        return {
            showReplyForm: false
        }
    },
    computed: {
        comments() { return this.$root.comments },
    }
}
</script>
