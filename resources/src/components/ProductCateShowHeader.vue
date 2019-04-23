<template>
    <section id="productCateShowHeader">
        <div class="hero">
            <div class="hero-head">
                <site-header :isBgWhite="true"></site-header>
            </div>
            <div class="hero-body" :style="style">
                <div class="container">
                    <h1 class="title is-2">{{ category.name }}</h1>
                    <site-breadcrumb type="ProductCateShow" :target="category"></site-breadcrumb>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
import SiteBreadcrumb from './SiteBreadcrumb.vue'

export default {
    name: 'ProductCateShowHeader',
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
        },
        category() { return this.$root.category }
    }
}
</script>

<style lang="scss" scoped>
    #productCateShowHeader {
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