<template>
    <section id="sitePageHomeNews">
        <hooper :settings="hooperSettings">
            <slide>slide 1</slide>
            <slide>slide 2</slide>
            <slide>slide 3</slide>
            <slide>slide 4</slide>
            <slide>slide 5</slide>
            <slide>slide 6</slide>
            <slide>slide 7</slide>
            <hooper-progress slot="hooper-addons"></hooper-progress>
        </hooper>
    </section>
</template>

<style lang="scss">
    #sitePageHomeNews {
        padding: 50px 0;
        .hooper {
            .hooper-list {
                .hooper-track {
                    .hooper-slide {
                        // your css here
                        font-size: 30px;
                        background-color: #62caaa;
                        border-radius: 10px;
                        border: 2px solid #fff;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                }
            }
            .hooper-progress {
                .hooper-progress-inner {
                    background-color: #4285f4; // default value
                }
            }
        }
    }
</style>

<script>
import {
    Hooper,
    Slide,
    Progress as HooperProgress,
    Pagination as HooperPagination,
    Navigation as HooperNavigation,
    } from 'hooper'

export default {
    name: 'SitePageHomeNews',
    components: {
        Hooper,
        Slide,
        HooperProgress,
        HooperPagination,
        HooperNavigation
    },
    data() {
        return {
            hooperSettings: {
                itemsToShow: 3,
                itemsToSlide: 1,
                infinitieScroll: true,
                centerMode: true,
                // mouseDrag: true,
                // touchDrag: true,
                // wheelControl: true,
                autoPlay: true,
                playSpeed: 3000,
                transition: 300,
                // breakpoints: {
                //     600: {
                //         itemsToShow: 2,
                //     },
                //     769: {
                //         itemsToShow: 3
                //     }
                // }
            }
        }
    }
}
</script>