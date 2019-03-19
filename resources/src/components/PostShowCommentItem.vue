<template>
    <article class="media comment">
        <div class="media-left">
            <figure class="image is-64x64 is-1by1">
                <a :href="linkToUserShow(comment)">
                    <img v-lazy="comment.user.avatar">
                </a>
            </figure>
        </div>

        <div class="media-content">
            <div class="user-name">{{ comment.user.name }}</div>
            <div class="comment-content">{{ comment.content }}</div>
            <div class="comment-meta">
                <span class="reply" @click="openForm">Reply</span>
                <span class="delimiter">-</span>
                <span class="time">{{ [comment.created_at, "YYYY-MM-DD HH:mm:ss"] | moment('from', 'now') }}</span>
            </div>

            <div v-if="comment.child_comment">
                <post-show-comment-item :comment="childComment" v-for="childComment in comment.child_comment" :key="childComment.id"></post-show-comment-item>
            </div>

            <comment-reply 
                v-if="replyForm" 
                :user="$root.author" 
                :parentID="comment.parent_id" 
                :postID="$root.post.id" 
                :closeButton="true" 
                @closeForm="closeForm">
            </comment-reply>
        </div>

    </article>
</template>

<script>
import PostShowCommentReply from './PostShowCommentReply.vue'

export default {
    name: 'PostShowCommentItem',
    components: {
        'comment-reply': PostShowCommentReply
    },
    data() {
        return {
            replyForm: false
        }
    },
    props: ['comment'],
    methods: {
        linkToUserShow(comment) { return location.origin + '/user/show/' + comment.user.id},
        closeForm() { this.replyForm = false },
        openForm() { this.replyForm = true }
    }
}
</script>
