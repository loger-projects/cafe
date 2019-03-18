<template>
    <div id="postShowAuthor">
        <div class="media">
            <div class="media-right">
                <figure class="image is-128x128 is-1by1">
                    <img v-lazy="author.avatar">
                </figure>
            </div>
            <div class="media-content">
                <p class="slogan">{{ author.slogan }}</p>
                <p class="description">{{ author.description }}</p>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    #postShowAuthor {
        background-color: #fff;
        margin-bottom: 2rem;
        padding: 10px 0;
        border: 1px solid #5d5d5d7a;
        .media {
            .media-right {
                padding: 0 20px 0 10px !important;
                margin: 0 !important;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .media-content {
                border-left: 1px solid saddlebrown;
                color: rgb(36, 17, 4);
                font-style: italic;
                padding: 0px 30px !important;
                text-align: justify;
                .slogan {
                    border-bottom: 1px solid #000000;
                    padding: 10px 0;
                    color: #000;
                    font-size: 1.25rem;
                }
                .description {
                    padding-top: 10px;
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'PostShowAuthor',
    data() {
        return {
            author: {}
        }
    },
    computed: {
        authorID() {
            return this.$root.post.user_id;
        }
    },
    mounted() {
        const authorID = this.authorID;
        axios.get(location.origin + '/api/user/show/1')
             .then(response => {
                 this.author = response.data
             })
             .catch(error => {
                 console.log(error)
             });
    }
}
</script>
