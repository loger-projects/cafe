<template>
    <section id="productIndexHeader">
        <div class="hero">
            <div class="hero-head">
                <site-header></site-header>
            </div>
            <div class="hero-body">
                <h1 class="title is-2">Products</h1>
            </div>
            <div class="hero-foot">
                <site-breadcrumb type="ProductIndex"></site-breadcrumb>
            </div>
        </div>
    </section>
</template>

<script>
import SiteHeader from './SiteHeader.vue'
export default {
    name: 'ProductIndexHeader',
    components: {
        SiteHeader
    }
}
</script>

<style lang="scss" scoped>
    #productIndexHeader {
        .hero {
            .hero-head {
                height: 60px;
                background-color: #000;
            }
            .hero-body {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .hero-foot {
                background: #000;
                display: flex;
                justify-content: center;
                padding: 10px 0;
            }
        }
    }
</style>
