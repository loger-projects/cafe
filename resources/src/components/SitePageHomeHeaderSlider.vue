<template>
    <div id="sitePageHomeHeader">
        <ul class="background-slider">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="slider-wrap"></div>
    </div>
</template>
<style lang="scss" scoped>
    div#SitePageHomeHeader {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/img/SitePageHome/Slider_00.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: 50% 50%;
        z-index: -1;
        div.slider-wrap {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: rgba(0, 0, 0, 0.438);
        }
        ul.background-slider {
            position: absolute;
            width: 100%;
            height: 100%;
            li {
                position: absolute;
                width: 100%;
                height: 100%;
                opacity: 0;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: 50% 50%;
                animation-name: SitePageHeaderSliderAnimation;
                animation-duration: 30s;
                animation-iteration-count: infinite;
                animation-timing-function: ease-in-out;
            }
            li:nth-child(1) {
                background-image: url('/img/SitePageHome/Slider_01.jpg');
            }
            li:nth-child(2) {
                background-image: url('/img/SitePageHome/Slider_02.jpg');
                animation-delay: 6s;
            }
            li:nth-child(3) {
                background-image: url('/img/SitePageHome/Slider_03.jpg');
                animation-delay: 12s;
            }
            li:nth-child(4) {
                background-image: url('/img/SitePageHome/Slider_04.jpg');
                animation-delay: 18s;
            }
            li:nth-child(5) {
                background-image: url('/img/SitePageHome/Slider_05.jpg');
                animation-delay: 24s;
            }
        }
    }
    @keyframes SitePageHeaderSliderAnimation {
        0%  { opacity: 0 }
        10% { opacity: 1 }
        20% { opacity: 1 }
        30% { opacity: 0 }
        100% { opacity: 0 }
    }
</style>
<script>
export default {
    name: 'SitePageHomeHeaderSlider',
    data() {
        return {
            
        }
    }
}
</script>
