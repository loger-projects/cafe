<template>
    <aside id="postShowSidebar">
        <div id="sidebar">
            <div class="categories widget">
                <div class="widget-title"><span>Categories</span></div>
                <div class="widget-content">
                    <div class="item" v-for="category in categories" :key="category.id">
                        <a class="item-title" :href="category.url">
                            {{ category.name }}(<span>{{ category.count }}</span>)
                        </a> 
                    </div>
                </div>
            </div>
            <div class="recent-posts widget">
                <div class="widget-title"><span>Recent Posts</span></div>
                <div class="widget-content">
                    <div class="item" v-for="post in posts" :key="post.id">
                        <a class="item-title" :href="post.url">{{ post.title }}</a>
                        <div class="item-footer">
                            <span>{{ [post.created_at] | moment("MMMM D, YYYY") }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="galleries widget">
                <div class="widget-title"><span>Galleries</span></div>
                <div class="widget-content">
                    <div class="columns is-multiline">
                        <div class="column is-4 item" v-for="gallery in galleries" :key="gallery.id">
                            <figure class="image is-1by1">
                                <img v-lazy="gallery.src" :alt="gallery.alt" :title="gallery.title">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-slider-wrapper" v-if="activeSlider">
                <button class="delete is-large" @click="closeSlider"></button>
                <gallery-slider :sliders="galleries" :activedID="activedID"></gallery-slider>
            </div>
        </div>
    </aside>
</template>

<style lang="scss" scoped>
    #postShowSidebar {
        padding: 0px 20px;
        #sidebar {
            background-color: #fff;
            padding: 20px 10px;
            .widget {
                margin-bottom: 30px;
                .widget-title {
                    position: relative;
                    text-align: center;
                    margin-bottom: 20px;
                    font-weight: bold;
                    &::before {
                        content: '';
                        display: block;
                        position: absolute;
                        top: 50%;
                        left: 0;
                        width: 100%;
                        height: 1px;
                        background: #ddd;
                        z-index: 0;
                    }
                    span {
                        text-transform: uppercase;
                        background: #fff;
                        position: relative;
                        z-index: 1;
                        padding: 0 5px;
                    }
                }
                &.recent-posts {
                    .widget-content {
                        .item {
                            margin-bottom: 10px;
                            .item-title {
                                color: #2a2a2a;
                            }
                            .item-footer {
                                padding-left: 15px;
                                span {
                                    color: #666;
                                    font-style: italic;
                                    font-size: 0.75rem;
                                }

                            }
                        }
                    }
                }
                &.categories {
                    .widget-content {
                        .item {
                            padding: 8px 0;
                            border-bottom: 1px solid #ddd;
                            .item-title {
                                color: #666;
                                span {
                                    color: #000;
                                }
                            }
                        }
                    }
                }
                &.galleries {
                    .widget-content {
                        .item {
                            padding: 5px !important;
                        }
                    }
                }
            }
            .gallery-slider-wrapper {
                background-color: rgba(0, 0, 0, 0.9);
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 5;
                padding-top: 50px;
                button.delete {
                    position: absolute;
                    color: #fff;
                    right: 50px;
                    top: 50px;
                    width: 50px;
                    height: 50px;
                    border-color: #fff;
                }
            }
        }
    }
</style>

<script>
import GallerySlider from './GallerySlider.vue'

export default {
    name: 'PostShowSidebar',
    components: {
        'gallery-slider' :GallerySlider
    },
    data() {
        return {
            activeSlider: false,
            activedID: ''
        }
    },
    methods: {
        showSlider() { this.activeGallerySlider = true },
        closeSlider() { this.activeGallerySlider = false }
    },
    computed: {
        posts() { return this.$root.latestPosts },
        categories() { return this.$root.categories },
        galleries() { return this.$root.galleries}
    },
    mounted() {

    }
}
</script>
