<template>
    <section id="siteFooter">
        <div class="container">
            <div class="columns">
                <div class="column site-logo">
                    <figure class="image"><img :src="$root.siteInfo.logoWhite"></figure>
                </div>
                <div class="column contact">
                    <span class="phone">+1  215  456  15  15</span>
                    <span class="open-time">8:00 am - 10:00 pm</span>
                </div>
                <div class="column social">
                    <span class="icon is-small"><i class="fab fa-twitter"></i></span>
                    <span class="icon is-small"><i class="fab fa-facebook-f"></i></span>
                    <span class="icon is-small"><i class="fab fa-instagram"></i></span>
                </div>
                <div class="column copyright">
                    copyright &copy; 2019 Loger Nam. All Rights Reserved
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #siteFooter {
        background-color: #080808;
        color: #fff;
        padding-top: 50px;
        .columns {
            justify-content: center;
            flex-direction: column;
            .column {
                text-align: center;
                padding: 10px 0 !important;
            }
        }
        .site-logo {
            .image {
                width: 213px;
                margin: 0 auto;
                img {
                    opacity: 0.4;
                }
            }
        }
        div.contact {
            font-size: 15px;
            span.open-time {
                opacity: 0.4;
                font-size: 13px;
                margin-left: 20px;
            }
        }
        div.social {
            span {
                margin: 0 5px;
            }
        }
        div.copyright {
            opacity: 0.4;
        }
    }
</style>

<script>
export default {
    name: 'SiteFooter'
}
</script>