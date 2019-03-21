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
                v-if="replyForm" 
                :user="$root.author" 
                :closeButton="true" 
                @closeForm="closeForm"
                @onSubmit="onSubmit"
                ref="commentReply">
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
    props: ['inputComment'],
    computed: {
        comment() { return this.inputComment },
        form() {
            return new Form({
                user_id: this.$root.author.id,
                post_id: this.$root.post.id,
                parent_id: this.comment.id,
                content: this.$refs.commentReply.content
            })
        }
    },
    methods: {
        linkToUserShow(comment) { return location.origin + '/user/show/' + comment.user_id},
        closeForm() { this.replyForm = false },
        openForm() { this.replyForm = true },
        onSubmit() {
            this.form.post('/api/comment')
                     .then(response => {
                         this.comment.child_comment.push(response)
                         this.replyForm = false
                     })
                     .catch(error => {
                         console.log(error)
                     })
        }
    }
}
</script>
