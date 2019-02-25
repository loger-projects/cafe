<template>
    <div id="site-page-home-header-banner">
        <!-- Banner -->
        <div class="banner-wrapper">
            <h1 class="title title-font-size">Hi ... Welcome to Dawat Restaurant</h1>
            <p class="slogan">All of us are pleased to be served you</p>
            <div class="navigate-button-box">
                <button class="btn-slider-white">View Menu</button>
                <button class="btn-slider-white">Buy a Gift</button>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    div#site-page-home-header-banner {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        div.banner-wrapper {
            position: relative;
            h1.title {
                margin-bottom: 23px;
            }
            p.slogan {
                text-align: end;
            }
            div.navigate-button-box {
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translate(-50%, 130%);
                display: flex;
                button.btn-slider-white {
                    border: 3px solid white;
                    color: white;
                    background: transparent;
                    outline: none;
                    padding: 30px 0px;
                    width: 250px;
                    font-size: 20px;
                }
                button.btn-slider-white:first-child {
                    margin-right: 45px;
                }
                button.btn-slider-white:last-child {
                    margin-left: 45px;
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'SitePageHomeHeaderBanner'
}
</script>
