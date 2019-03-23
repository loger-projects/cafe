<template>
    <article class="media comment">
        <div class="media-content">
            {{ inputComment.content }}
        </div>
    </article>
</template>

<script>
export default {
    name: 'PostShowCommentItemNoReply',
    props: ['inputComment']
}
</script>