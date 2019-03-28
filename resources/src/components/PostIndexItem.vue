<template>
    <article class="post-item">
        <div class="article-head">
            <figure class="image is-5by3 post-thumbnail">
                <a :href="post.url">
                    <img v-lazy="post.thumbnail">
                </a>
            </figure>
        </div>
        <div class="article-body">
            <div class="post-title title"><a :href="post.url">{{ post.title }}</a></div>
            <div class="post-meta">
                <span class="item">
                    <span class="post-meta--item icon is-small"><i class="fas fa-user"></i></span>
                    <span class="post-meta--value">{{ post.author.name }}</span>
                </span>
                <span class="item">
                    <span class="post-meta--item icon is-small"><i class="fas fa-comments"></i></span>
                    <span class="post-meta--value">{{ post.comment_count }}</span>
                </span>
                <span class="item">
                    <span class="post-meta--item icon is-small"><i class="far fa-calendar-alt"></i></span>
                    <span class="post-meta--value">{{ [post.created_at] | moment('from', 'now') }}</span>
                </span>
            </div>
            <div class="post-excerpt">{{ post.content.slice(0, 200) + ' ...' }}</div>
        </div>
    </article>
</template>

<script>
export default {
    name: 'PostIndexItem',
    props: ['post']
}
</script>
