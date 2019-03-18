<template>
    <div id="postShowHeader" :style="background">
        <div class="post-header-background"></div>
        <div class="hero is-large post-header">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body">
                <h1 class="title is-1">{{ $root.post.title }}</h1>
            </div>
            <div class="hero-foot"><site-breadcrumb type="post" :target="$root.post"></site-breadcrumb></div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    #postShowHeader {
        position: relative;
        background-size: cover;
        background-attachment: fixed;
        background-position: 50% 50%;
        .post-header-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }
        .hero {
            position: relative;
            z-index: 1;
            .hero-body {
                display: flex;
                justify-content: center;
                align-items: center;
                h1.title {
                    color: #fff;
                }
            }
            .hero-foot{
                display: flex; 
                justify-content: center;
            }
        }
    }
</style>

<script>
import SiteHeader from './SiteHeader.vue'
import SiteBreadcrumb from './SiteBreadcrumb.vue'

export default {
    name: 'PostShowHeader',
    components: {
        SiteHeader,
        SiteBreadcrumb
    },
    computed: {
        background() {
            return "background-image: url('" + this.$root.$root.post.thumbnail + "')";
        }
    }
}
</script>
