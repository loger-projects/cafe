<template>
    <div class="galleries widget">
        <div class="widget-title"><span>Galleries</span></div>
        <div class="widget-content">
            <div class="columns is-multiline">
                <div class="column is-4 item" v-for="gallery in galleries" :key="gallery.id">
                    <figure class="image is-1by1">
                        <img 
                            v-lazy="gallery.src" 
                            :alt="gallery.alt" 
                            :title="gallery.title"
                            @click="openSlider(galleries.indexOf(gallery))">
                    </figure>
                </div>
            </div>
            <div class="load-more">
                <button class="button load-more-button" @click="loadMoreGalleries">Load More</button>
            </div>
        </div>
        <gallery-slider :sliders="galleries" :index="index" v-if="activeSlider" @closeSlider="closeSlider"></gallery-slider>
    </div>
</template>

<script>
import GallerySlider from './GallerySlider.vue'

export default {
    name: 'SidebarGalleries',
    props: ['galleries'],
    components: {
        'gallery-slider' : GallerySlider
    },
    data() {
        return {
            activeSlider: false,
            index: 0
        }
    },
    methods: {
        closeSlider() { this.activeSlider = false },
        openSlider(index) {
            this.index = index;
            this.activeSlider = true;
        },
        loadMoreGalleries() {
            axios.get('/api/galleries/skip/'+ this.galleries.length +'/take/6')
                .then(response => {
                    for (let key in response.data) {
                        this.galleries.push(response.data[key])
                    }
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
        }
    }
}
</script>

<style lang="scss" scoped>
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
        &.galleries {
            .widget-content {
                .item {
                    padding: 5px !important;
                    img {
                        cursor: pointer;
                    }
                }
                .load-more {
                    text-align: center;
                    margin-top: 15px;
                    .load-more-button {
                        color: #fff;
                        background-color: #000;
                    }
                }
            }
        }
    }
</style>