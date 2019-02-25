<template>
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-auto site-logo">
                <!-- Logo -->
                <h1 class="title">Dawat Restaurant</h1>
                <div class="site-logo-img">
                    <img src="/img/SiteHeaderNavLogoWhite.png" alt="No Image">
                </div>
            </div>
            <div class="col navigator">
                <!-- Navigation -->
                <ul class="nav">
                    <li class="nav-item" v-for="link in links" :key="link.id">
                        <a :href="link.href" :class="{'nav-link': true, 'is-active': link.isActive}" @click="activeLink(link)">{{ link.title }}</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
            <div class="col-auto items-box">
                <!-- cart / user -->
                <a href="#"><i class="fas fa-user"></i></a>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    div#site-header-nav {
        div.site-logo {
            position: relative;
            h1.title {
                width: 0;
                height: 0;
                position: absolute;
                opacity: 0;
            }
            div.site-logo-img {
                position: absolute;
                left: 30px;
                bottom: 20px;
            }
        }
        div.navigator {
            ul.nav {
                justify-content: flex-end !important;
                li a {
                    color: #fff;
                    padding: 40px 20px;
                    border: none;
                    font-family: 'Lato', sans-serif;
                }
                li a:hover {
                    color: rgb(238, 245, 181);
                }
                li a.is-active {
                    color: rgb(207, 216, 122);
                    border-top: 2px solid rgb(207, 216, 122);
                }
            }
        }
        div.items-box {
            display: flex;
            justify-content: center;
            align-items: center;
            a {
                color: #fff;
                font-size: 1.25rem;
                margin: 0 10px;
            }
        }
    }
</style>

<script>
export default {
    name: 'SiteHeaderNavDesktopNav',
    data() {
        return {
            links: this.$parent.links
        }
    },
    methods: {
        activeLink(currentLink) {
            this.links.forEach(link => {
                link.isActive = (link.title == currentLink.title);
            });
        }
    }
}
</script>
