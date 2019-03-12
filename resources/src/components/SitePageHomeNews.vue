<template>
    <section id="sitePageHomeNews">
        <carousel
            :perPageCustom="[[480,2], [768,3], [1216, 4]]"
            ease="ease-in-out"
            :paginationEnabled="false"
            :navigationEnabled="true"
        >
            <slide v-for="post in posts" :key="post.id">
                <article class="article post-list-item">
                    <div class="article-head">
                        <figure class="post-thumbnail image is-1by1">
                            <img :src="post.thumbnail" alt="No Thumbnail">
                        </figure>
                    </div>
                    <div class="article-body">
                        <div class="post-title title">{{ post.title }}</div>
                        <div class="post-meta"><span class="icon is-small"><i class="far fa-calendar-alt"></i></span>{{ [post.created_at, "YYYY-MM-DD HH:mm:ss" ] | moment('from', 'now') }}</div>
                        <!-- 03:43AM on 09 Dec 18 -->
                        <div class="post-excerpt">{{ post.excerpt }}</div>
                    </div>
                </article>
            </slide>
        </carousel>
    </section>
</template>

<style lang="scss">
    #sitePageHomeNews {
        .VueCarousel {
            .VueCarousel-wrapper {
                .VueCarousel-inner {
                    .VueCarousel-slide {
                        position: relative;
                        background: #42b983;
                        color: #fff;
                        font-family: Arial;
                        font-size: 24px;
                        text-align: center;
                        min-height: 100px;
                    }
                }
            }
            .VueCarousel-navigation {
                .VueCarousel-navigation-button {
                    transform: translate(0%, -50%) !important;
                    padding: 0 10px 0 10px !important;
                    font-size: 25px;
                    z-index: 3;
                    margin: 0 !important;
                    height: 100%;
                    background-color: #00000055;
                    transition: 300ms;
                }
                .VueCarousel-navigation-button:not(.VueCarousel-navigation--disable) {
                    color: #1f1105;
                    &:hover {
                        color: #fff;
                        background-color: #000000b2;
                    }
                }
                .VueCarousel-navigation-button.VueCarousel-navigation--disable {
                    color: #3d3d3d;
                    &:hover {
                        color: #3d3d3d;
                        background-color: #00000055;
                    }
                }
                .VueCarousel-navigation-button.VueCarousel-navigation-prev {
                    left: 0;
                    top: 50%;
                }
                .VueCarousel-navigation-button.VueCarousel-navigation-next {
                    right: 0;
                    top: 50%;
                }
            }
        }
        .article {
            .article-head {
                .post-thumbnail {
                    img {
                        width: 100%;
                    }
                }
            }
            .article-body {
                .post-title {
                    padding: 10px;
                }
                .post-meta {
                    padding: 10px;
                    color: #585858;
                }
                .post-except {
                    padding: 10px;
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'SitePageHomeNews',
    components: {
    },
    data() {
        return {
            hooperSettings: {
            },
            posts: null
        }
    },
    mounted() {
        axios.get('/post/get/10/latest/posts')
             .then(response => {
                 this.posts = response.data
             })
             .catch(error => {
                 console.log(error)
             });
    }
}
</script>