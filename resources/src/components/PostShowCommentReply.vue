<template>
    <article class="media create-comment">
        <div class="media-left">
            <figure class="image is-64x64 is-1by1">
                <img v-lazy="user.avatar">
            </figure>
        </div>
        <div class="media-content">
            <form>
                <div class="content">
                    <input type="hidden" name="userID" :value="user.id">
                    <input type="hidden" name="parentID" :value="parentID">
                    <input type="hidden" name="postID" :value="postID">
                    <textarea name="content" class="textarea" placeholder="Post a comment"></textarea>
                </div>
                <div class="submit">
                    <button class="button is-primary" type="submit">Post Comment</button>
                </div>
            </form>
        </div>
        <div class="media-right" v-if="closeButton">
            <button class="delete" @click="closeForm"></button>
        </div>
    </article>    
</template>

<script>
export default {
    name: 'PostShowCommentReply',
    props: ['user', 'parentID', 'closeButton', 'postID'],
    methods: {
        closeForm() {
            this.$emit('closeForm')
        }
    }
}
</script>
