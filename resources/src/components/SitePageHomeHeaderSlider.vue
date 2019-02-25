<template>
    <div id="site-page-home-header-slider">
        <ul class="background-slider">
            <li class="bg-slide-item"></li>
            <li class="bg-slide-item"></li>
            <li class="bg-slide-item"></li>
            <li class="bg-slide-item"></li>
            <li class="bg-slide-item"></li>
        </ul>
    </div>
</template>
<style lang="scss" scoped>
    div#site-page-home-header-slider {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    ul.background-slider {
        position: relative;
        width: 100%;
        height: 100%;
        li.bg-slide-item {
            position: relative;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
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
