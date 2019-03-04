<template>
    <div id="bulma-component">
        <section class="hero is-dark is-fullheight">
            <div class="hero-head">
                <bulma-header></bulma-header>
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Title
                    </h1>
                    <h2 class="subtitle">
                        Sub Title
                    </h2>
                </div>
            </div>
            <div class="hero-foot has-text-centered">
                <p>Aut molestiae dignissimos aut omnis qui sint beatae.</p>
            </div>
        </section>
        <bulma-comment></bulma-comment>
    </div>
</template>

<script>
import BulmaHeader from '../components/BulmaHeader.vue'
import BulmaComment from '../components/BulmaComment.vue'

export default {
    name: 'BulmaComponent',
    components: {
        'bulma-header': BulmaHeader,
        'bulma-comment': BulmaComment
    }
}
</script>
