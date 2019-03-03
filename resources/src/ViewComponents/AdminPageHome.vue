<template>
    <div>
        <admin-header></admin-header>
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Title
                    </h1>
                    <h2 class="subtitle">
                        Sub Title
                    </h2>
                </div>
            </div>
        </section>
        <admin-comment></admin-comment>
    </div>
</template>

<style lang="scss">
    .test-section {
        border-bottom: 1px solid black;
        div.column {
            background-color: rgb(78, 209, 148);
            height: 100px;
            border: 1px solid rgb(12, 13, 31);
        }
    }
    .second-section {
        border-bottom: 1px solid black;
        div.column {
            background-color: rgb(215, 224, 131);
            border: 1px solid rgb(231, 10, 10);
        }
    }
</style>

<script>
import AdminHeader from '../components/AdminHeader.vue'
import AdminComment from '../components/AdminComment.vue'

export default {
    name: 'AdminPageHome',
    components: {
        'admin-header' : AdminHeader,
        'admin-comment' : AdminComment
    },
    data() {
        return {
            
        }
    }
}
</script>
