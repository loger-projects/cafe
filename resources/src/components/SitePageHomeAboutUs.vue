<template>
    <section id="sitePageHomeAboutUs">
        <div class="container">
            <div class="columns custom-card">
                <div class="column custom-card-content">
                    <h2 class="about-title"><p class="first-title title is-dancing-script text-yellow">Our</p><p class="second-title title is-1 is-font-lato">philosophy</p></h2>
                    <p class="about-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut</p>
                    <p class="about-signature is-font-kristi">Loger Nam</p>
                </div>
                <div class="column custom-card-image">
                    <figure class="image">
                        <img :src="imgs.img1">
                    </figure>
                </div>
            </div>
            <div class="columns is-reverse custom-card">
                <div class="column custom-card-content">
                    <h2 class="about-title"><p class="first-title title is-dancing-script text-yellow">Dining</p><p class="second-title title is-1 is-font-lato">experience</p></h2>
                    <p class="about-slogan">ULTIMATE DINING EXPERIENCE LIKE NO OTHER. OUR MODERN FUSION CUISINE</p>
                    <p class="about-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="column custom-card-image">
                    <figure class="image"><img :src="imgs.img2"></figure>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #sitePageHomeAboutUs {
        padding: 50px 0;
        div.columns.is-reverse {
            @media only screen and (min-width: 769px) {
                flex-direction: row-reverse;
            }
        }
        .custom-card {
            .custom-card-content {
                padding: 30px 20px !important;
                .about-title {
                    .first-title {
                        margin-bottom: 0px;
                    }
                    .second-title {
                        text-transform: uppercase;
                        font-weight: 300 !important;;
                    }
                }
                .about-slogan {
                    text-transform: uppercase;
                    padding: 1rem 0;
                }
            }
            .custom-card-image {
                padding: 30px !important;
            }
        }
    }
</style>

<script>
import SitePageHomeTitle from './SitePageHomeTitle.vue'

export default {
    name: 'SitePageHomeAboutUs',
    computed: {
        origin() {
            return this.$root.siteInfo.origin;
        },
        imgs() {
            return {
                img1: this.origin + '/img/SitePageHome/about_img_1.jpg',
                img2: this.origin + '/img/SitePageHome/about_img_2.jpg'
            }
        }
    }
}
</script>
