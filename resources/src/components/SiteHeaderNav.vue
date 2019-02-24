<template>
    <div id="site-header-nav">
        <div class="container">
            <div class="row">
                <div class="col-auto site-logo">
                    <!-- Logo -->
                    <h1 class="title">Dawat Restaurant</h1>
                    <div class="site-logo-img">
                        <img src="/img/SiteHeaderNavLogoBlack.png" alt="No Image">
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
    </div>
</template>
<style lang="scss" scoped>
    div#site-header-nav {
        border: 2px solid #000;
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
                    color: #000;
                    padding: 40px 20px;
                    border: none;
                    font-weight: bold;
                    font-family: 'Lato', sans-serif;
                }
                li a.is-active {
                    color: rgb(10, 115, 119);
                    border-top: 2px solid rgb(20, 157, 161);
                    border-bottom-color: transparent;
                    border-right-color: transparent;
                    border-left-color: transparent;
                    background: linear-gradient(to bottom, rgba(20, 157, 161, 0.4) 0%, rgba(20, 157, 161, 0) 40%);
                }
            }
        }
        div.items-box {
            display: flex;
            justify-content: center;
            align-items: center;
            a {
                color: #000;
                font-size: 1.25rem;
                margin: 0 10px;
            }
        }
    }
    div.items-box {
        a {
            color: #000;
        }
    }
</style>

<script>
export default {
    name: 'SiteHeaderNav',
    data() {
        return {
            links: [ // get this from ajax
                {title: 'Home', href: '#', isActive: false},
                {title: 'About Us', href: '#', isActive: false},
                {title: 'Offer', href: '#', isActive: false},
                {title: 'Menu', href: '#', isActive: false},
                {title: 'Team', href: '#', isActive: false},
                {title: 'Blog', href: '#', isActive: false},
                {title: 'Gallery', href: '#', isActive: false}
            ]
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