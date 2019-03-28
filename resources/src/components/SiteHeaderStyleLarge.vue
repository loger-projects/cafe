<template>
    <div :style="style" class="site-header-style-large">
        <div class="header-background"></div>
        <div class="hero is-large">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body">
                <h1 :class="{'title is-1': true, 'strong': isTitleStrong}">{{ title }}</h1>
                <p class="description" v-if="description">{{ description }}</p>
            </div>
        </div>
        <div class="hero-foot" v-if="activeHeroFoot">
            <site-breadcrumb :type="breadcrumbType" :target="breadcrumbTarget ? breadcrumbTarget : ''" v-if="activeBreadcrumb"></site-breadcrumb>
        </div>
    </div>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
import SiteBreadcrumb from './SiteBreadcrumb.vue'

export default {
    name: 'SiteHeaderStyleLarge',
    components: {
        SiteHeader,
        SiteBreadcrumb
    },
    props: [
        'backgroundURL',
        'title',
        'isTitleStrong',
        'description',
        'activeHeroFoot',
        'breadcrumbType',
        'breadcrumbTarget',
        'activeBreadcrumb',
    ],
    computed: {
        style() {
            return "background-image: url('" + this.backgroundURL + "')";
        }
    }
}
</script>

<style lang="scss" scoped>
    .site-header-style-large {
        position: relative;
        background-size: cover;
        background-attachment: fixed;
        background-position: 50% 50%;
        .header-background {
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
                flex-direction: column;
                h1.title {
                    color: #fff;
                    margin: 0;
                    text-transform: uppercase;
                    &.strong {
                        font-size: 56px;
                        font-family: 'aileron-black';
                    }
                }
                p.description {
                    color: #fff;
                    margin: 10px 0 0 0;
                    text-transform: uppercase;
                }
            }
            .hero-foot{
                display: flex; 
                justify-content: center;
                background-color: rgba(0, 0, 0, 0.7);
                padding: 0.5rem 0;
            }
        }
    }
</style>