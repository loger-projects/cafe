<template>
    <div id="gallerySlider">
        <button class="delete is-large" @click="closeSlider"></button>
        <div class="container">
            <carousel 
                rel="carousel"
                easing="ease-in-out"
                :perPage="1"
                :scrollPerPage="true"
                :paginationEnabled="false"
                :navigationEnabled="true"
                :navigationClickTargetSize="15"
                :navigateTo="index"
                >
                <slide
                    v-for="slide in sliders"
                    :key="slide.id"
                >
                    <figure class="image">
                        <img 
                            v-lazy="slide.src" 
                            :alt="slide.alt" 
                            :title="slide.title">
                    </figure>
                </slide>
            </carousel>
        </div>
    </div>
</template>

<script>
export default {
    name: 'GallerySlider',
    props: ['sliders', 'index'],
    computed: {
        currentPage() { return this.$refs.carousel ? this.$refs.carousel.currentPage : 0 }
    },
    methods: {
        closeSlider() { this.$emit('closeSlider') }
    }
}
</script>

<style lang="scss">
    #gallerySlider {
        background-color: rgba(0, 0, 0, 0.9);
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 5;
        button.delete {
            position: absolute;
            color: #fff;
            right: 50px;
            top: 50px;
            width: 50px;
            height: 50px;
            border-color: #fff;
            z-index: 3;
        }
        .VueCarousel {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            .VueCarousel-slide {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .VueCarousel-navigation {
                position: fixed;
                left: 0;
                bottom: 0;
                z-index: 5;
                background-color: rgba(0, 0, 0, 0.8);
                height: 30px !important;
                width: 100%;
                display: flex;
                transform: translate(0%, 0%);
                .VueCarousel-navigation-button {
                    position: relative;
                    top: 0;
                    color: #fff;
                    flex: 1;
                    background-color: #000;
                    transform: translate(0%, 0%);
                    padding: 0 !important;
                    margin: 0 !important;
                    &.VueCarousel-navigation--disabled {
                        color: #ddd;
                    }
                }
            }
        }
    }
</style>