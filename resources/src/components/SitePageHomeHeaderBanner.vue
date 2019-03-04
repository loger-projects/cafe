<template>
    <div id="sitePageHomeHeaderBanner">
        <p class="title is-4 title-pacifico">Dawat</p>
        <p class="title is-1 has-text-white">Restaurant</p>
        <div class="slogan-wrap"><span class="slogan">The Best Restaurant in The World</span></div>
        <div><a href="#" class="button is-small btn-yellow-dark">Look Menu</a></div>
    </div>
</template>
<style lang="scss" scoped>
    #sitePageHomeHeaderBanner {
        text-align: center;
        .title {
            margin: 0;
        }
        .slogan-wrap {
            margin: 20px 0;
        }
        .slogan {
            color: white;
            position: relative;
            &::before {
                content: '';
                height: 0;
                width: 50px;
                border: 1px solid white;
                position: absolute;
                top: calc(70% - 2px);
                left: 0;
                transform: translateX(-110%);
            }
            &::after {
                content: '';
                height: 0;
                width: 50px;
                border: 1px solid white;
                position: absolute;
                top: calc(70% - 2px);
                right: 0;
                transform: translateX(110%);
            }
        }
    }
</style>
<script>
export default {
    name: 'SitePageHomeHeaderBanner'
}
</script>
