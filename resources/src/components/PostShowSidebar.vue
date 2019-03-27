<template>
    <aside id="postShowSidebar">
        <div id="sidebar">
            <div class="categories"><button class="butttun is-primary" @click="showSlider">Show Slider</button></div>
            <div class="posts"></div>
            <div class="gollery"></div>
            <div id="fullscreen"></div>
            <div id="gallery-slider" v-if="activeGallerySlider">
                <button class="delete is-large" @click="closeSlider"></button>
                <div class="container">
                    <figure class="image">
                        <img src="http://cafe.div/img/MenuHeadBackground.jpg">
                    </figure>
                </div>
            </div>
        </div>
    </aside>
</template>

<style lang="scss" scoped>
    #postShowSidebar {
        padding: 0px 20px;
        #sidebar {
            background-color: #fff;
            #gallery-slider {
                background-color: rgba(7, 7, 7, 0.9);
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
                .image {
                    img {
                        width: 100%;
                    }
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
        GallerySlider
    },
    data() {
        return {
            activeGallerySlider: false
        }
    },
    methods: {
        showSlider() { this.activeGallerySlider = true },
        closeSlider() { this.activeGallerySlider = false }
    },
    mounted() {
        let GalleryClass = Vue.extend(GallerySlider)
        let instance = new GalleryClass()
        instance.$mount()
        instance.sliders = 'Value'
        document.getElementById('fullscreen').appendChild(instance.$el)
    }
}
</script>
