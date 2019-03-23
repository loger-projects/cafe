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
                <span class="time">{{ [comment.created_at] | moment("YYYY MMMM DD HH:mm:ss") }}</span>
            </div>

            <div v-if="comment.child_comment">
                <post-show-comment-item 
                    v-for="childComment in comment.child_comment" 
                    :key="childComment.id"
                    :inputComment="childComment" >
                    </post-show-comment-item>
            </div>

            <comment-reply 
                v-if="showReplyForm" 
                @closeForm="closeForm"
                :closeButton="true" 
                :isRootComment="false"
                :parentID="comment.id"
                >
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
            showReplyForm: false
        }
    },
    props: ['inputComment'],
    computed: {
        comment() { return this.inputComment },
    },
    methods: {
        linkToUserShow(comment) { return location.origin + '/user/show/' + comment.user_id},
        closeForm() { this.showReplyForm = false },
        openForm() { this.showReplyForm = true },
    }
}
</script>
