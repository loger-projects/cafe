<template>
    <section id="sitePageHomeNews">
        <div class="background-wrap"></div>
        <div class="news-title">
            <home-title isTextWhite="true">
                <template slot="firstTitle">What</template>
                <template slot="secondTitle">News</template>
            </home-title>
        </div>
        <div class="container">
            <carousel
                :perPageCustom="[[300, 1],[480,2], [768,3], [1216, 4]]"
                ease="ease-in-out"
                :paginationEnabled="false"
                :navigationEnabled="true"
            >
                <slide v-for="post in posts" :key="post.id">
                    <article class="article post-list-item">
                        <div class="article-head">
                            <figure class="post-thumbnail image is-1by1">
                                <img v-lazy="post.thumbnail" alt="No Thumbnail">
                            </figure>
                        </div>
                        <div class="article-body">
                            <div class="post-title title is-5"><a :href="$post.url">{{ post.title }}</a></div>
                            <div class="post-meta"><span class="icon is-small"><i class="far fa-calendar-alt"></i></span><span class="post-meta--value">{{ [post.created_at, "YYYY-MM-DD HH:mm:ss" ] | moment('from', 'now') }}</span></div>
                            <!-- 03:43AM on 09 Dec 18 -->
                            <div class="post-excerpt">{{ post.excerpt }}</div>
                        </div>
                    </article>
                </slide>
            </carousel>
        </div>
    </section>
</template>

<style lang="scss">
    #sitePageHomeNews {
        padding: 50px 0;
        background-image: url('/img/SitePageHome/news_bg.jpg');
        background-size: cover;
        background-position: 50% 50%;
        background-attachment: fixed;
        position: relative;
        .background-wrap {
            background-color: #000000ab;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        .news-title {
            margin: 10px 0 30px 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #91847f;
            position: relative;
            z-index: 1;
        }
        .VueCarousel {
            .VueCarousel-wrapper {
                .VueCarousel-inner {
                    .VueCarousel-slide {
                        padding: 0;
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
                    color: #fcfcfc;
                    &:hover {
                        color: #fff;
                        background-color: #000000b2;
                    }
                }
                .VueCarousel-navigation-button.VueCarousel-navigation--disable {
                    color: #a0a0a0;
                    &:hover {
                        color: #a0a0a0 !important;
                        background-color: #00000055 !important;
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
                padding-right: 20px;
                .post-title {
                    padding: 20px 0;
                    color: #ffffff;
                    margin-bottom: 0;
                    max-height: calc(2rem + 40px);
                    overflow: hidden;
                }
                .post-meta {
                    padding: 10px 0;
                    color: #c2c2c2;
                    span.icon {
                        margin-right: 10px;
                    }
                    span.post-meta--value {
                        color: #7fd873;
                    }
                }
                .post-excerpt {
                    padding: 10px 0;
                    color: #e9ecbf;
                }
            }
        }
    }
</style>

<script>
import SitePageHomeTitle from './SitePageHomeTitle.vue'
export default {
    name: 'SitePageHomeNews',
    components: {
        'home-title': SitePageHomeTitle
    },
    data() {
        return {
            hooperSettings: {
            },
            posts: null
        }
    },
    mounted() {
        axios.get('/post/api/10/latest-posts')
             .then(response => {
                 this.posts = response.data
             })
             .catch(error => {
                 console.log(error)
             });
    }
}
</script>