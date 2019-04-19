<template>
    <section id="productShowHeader">
        <div class="hero">
            <div class="hero-head">
                <site-header :isBgWhite="true"></site-header>
            </div>
            <div class="hero-body" :style="style">
                <div class="container">
                    <h1 class="title is-1">{{ $root.product.name }}</h1>
                    <site-breadcrumb type="ProductShow" :target="$root.product"></site-breadcrumb>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
import SiteBreadcrumb from './SiteBreadcrumb.vue'

export default {
    name: 'ProductShowHeader',
    components: {
        SiteHeader,
        SiteBreadcrumb
    },
    computed: {
        backgroundImage() {
            return location.origin + '/img/products/ProductShowHeaderBackground.jpg'
        },
        style() {
            return "background-image: url('"+this.backgroundImage+"')"
        }
    }
}
</script>

<style lang="scss" scoped>
    #productShowHeader {
        .hero {
            .hero-head {
                height: 60px;
                background-color: #fff;
            }
            .hero-body {
                background-position: 50% 50%;
                background-attachment: fixed;
                background-size: cover;
                .container {
                    color: #fff;
                    .title {
                        color: #fff;
                    }
                }
            }
        }
    }
</style>
