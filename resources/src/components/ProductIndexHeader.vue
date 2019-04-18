<template>
    <section id="productIndexHeader">
        <div class="hero">
            <div class="hero-head">
                <site-header
                    :isBgWhite="true"
                ></site-header>
            </div>
            <div class="hero-body">
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
                background-color: #000;
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
