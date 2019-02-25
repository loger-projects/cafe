<template>
    <div id="site-page-home-header-slider">
        <carousel :autoplayTimeout="3000" :easing="'ease-in-out'">
            <slide>
                <div class="slider-1">Slider 1</div>
            </slide>
            <slide>
                <div class="slider-2">Slider 2</div>
            </slide>
            <slide>
                <div class="slider-3">Slider 3</div>
            </slide>
            <slide>
                <div class="slider-4">Slider 4</div>
            </slide>
            <slide>
                <div class="slider-5">Slider 5</div>
            </slide>
        </carousel>
    </div>
</template>
<style lang="scss" scoped>
    div#site-page-home-header-slider {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: yellowgreen;
        z-index: -1;
    }
    .VueCarousel-slide {
        div {
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            position: absolute;
        }
        .slider-1 {
            background-image: url('/img/SitePageHeaderSlider1.jpg');
        }
        .slider-2 {
            background-image: url('/img/SitePageHeaderSlider2.jpg');
        }
        .slider-3 {
            background-image: url('/img/SitePageHeaderSlider3.jpg');
        }
        .slider-4 {
            background-image: url('/img/SitePageHeaderSlider4.jpg');
        }
        .slider-5 {
            background-image: url('/img/SitePageHeaderSlider5.jpg');
        }
    }
</style>
<script>
import Vue from 'vue';
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

export default {
    name: 'SitePageHomeHeaderSlider',
    components: {
        // 'carousel': VueCarousel.Carousel,
        // 'slide': VueCarousel.Slide
    }
}
</script>
