<template>
    <section id="productIndexHeader">
        <div class="hero">
            <div class="hero-head">
                <site-header :isBgWhite="true"></site-header>
            </div>
            <div class="hero-body" :style="style">
                <div class="container">
                    <h1 class="title is-2">Products</h1>
                    <site-breadcrumb type="ProductIndex"></site-breadcrumb>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
import SiteBreadcrumb from './SiteBreadcrumb.vue'

export default {
    name: 'ProductIndexHeader',
    components: {
        SiteHeader,
        SiteBreadcrumb
    },
    computed: {
        backgroundImage() {
            return location.origin + '/img/products/ProductIndexHeaderBackground.jpg'
        },
        style() {
            return "background-image: url('"+this.backgroundImage+"')"
        }
    }
}
</script>

<style lang="scss" scoped>
    #productIndexHeader {
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
