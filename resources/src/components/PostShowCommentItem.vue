<template>
    <article class="media comment">
        <div class="media-left">
            <figure class="image is-64x64 is-1by1">
                <img v-lazy="comment.user.avatar">
            </figure>
        </div>

        <div class="media-content">
            <div class="user-name">{{ comment.user.name }}</div>
            <div class="comment-content">{{ comment.content }}</div>
            <div class="comment-meta">
                <span class="reply" @click="openForm">Reply</span>
                <span class="delimiter">-</span>
                <span class="time">{{ [comment.created_at] | moment("YYYY MMMM DD HH:mm:ss") }}</span>
            </div>

            <div v-if="comment.child_comment">
                <div
                    v-for="childComment in comment.child_comment" 
                    :key="childComment.id"
                >
                    <post-show-comment-item 
                        :inputComment="childComment" 
                        v-if="childComment.level == 1">
                    </post-show-comment-item>
                    <comment-no-reply
                        :inputComment="childComment"
                        v-if="childComment.level >= 2"
                    ></comment-no-reply>
                </div>
            </div>

            <comment-reply 
                v-if="showReplyForm" 
                @closeForm="closeForm"
                :closeButton="true" 
                :isRootComment="false"
                :parentID="comment.id"
                :level="level"
                >
            </comment-reply>
        </div>
    </article>
</template>

<script>
import PostShowCommentReply from './PostShowCommentReply.vue'
import PostShowCommentItemNoReply from './PostShowCommentItemNoReply.vue'

export default {
    name: 'PostShowCommentItem',
    components: {
        'comment-reply': PostShowCommentReply,
        'comment-no-reply': PostShowCommentItemNoReply
    },
    data() {
        return {
            showReplyForm: false
        }
    },
    props: ['inputComment'],
    computed: {
        comment() { return this.inputComment },
        level() { return this.comment.level > 0 ? 2 : 1 }
    },
    methods: {
        closeForm() { this.showReplyForm = false },
        openForm() { this.showReplyForm = true },
    }
}
</script>
