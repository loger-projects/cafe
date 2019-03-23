<template>
    <article class="media create-comment">

        <div class="media-left">
            <figure class="image is-64x64 is-1by1">
                <img v-lazy="$root.author.avatar">
            </figure>
        </div>

        <div class="media-content">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                <div class="content">
                    <textarea 
                        name="content" 
                        class="textarea" 
                        placeholder="Post a comment" 
                        v-model="form.content"></textarea>
                    <p class="help is-danger" v-if="form.errors.has('content')">{{ form.errors.get('content') }}</p>
                </div>

                <div class="submit">
                    <button class="button is-primary" type="submit" :disable="form.errors.any()">Post Comment</button>
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
    props: [
        'closeButton', 
        'isRootComment', 
        'parentID',
    ],
    data() {
        return {
            form: new Form({
                user_id: this.$root.author.id,
                post_id: this.$root.post.id,
                parent_id: this.parentID,
                content: '' 
            })
        }
    },
    methods: {
        closeForm() {
            this.$emit('closeForm')
        },
        onSubmit() {
            this.form.post('/api/comment')
                     .then(response => {
                         if(this.isRootComment) {
                             this.$parent.comments.push(response)
                             this.form.content = ''
                         } else {
                             this.$parent.comment.child_comment.push(response)
                         }
                         this.$emit('closeForm')
                     })
                     .catch(error => {
                         console.log(error.message)
                     })
        }
    }
}
</script>
