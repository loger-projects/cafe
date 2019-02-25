<template>
    <div class="container d-block d-lg-none">
        <div class="row nav-title-wrap">
            <div class="col-auto show-nav-button"><a href="#" @click="showNavigator"><i class="fas fa-bars"></i></a></div>
            <div class="col site-logo">
                <div class="site-logo-img-wrap"><img src="/img/SiteHeaderNavLogoWhite.png" alt="No Logo"></div>
            </div>
            <div class="col-auto items-box">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        <div class="row navigator" id="navigator">
            <div class="hide-navigator"><a href="#" @click="hideNavigator"><i class="fas fa-times"></i></a></div>
            <div class="navigator-logo">
                <div class="img-wrap"><img src="/img/SiteHeaderNavLogoWhite.png" alt="No Logo"></div>
            </div>
            <div class="navigator-content">
                <ul class="nav flex-column">
                    <li class="nav-item" v-for="link in links" :key="link.id">
                        <a :href="link.href" :class="{'nav-link': true, 'is-active': link.isActive}" @click="activeLink(link)">{{ link.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    @keyframes ShowNavigator {
        0% {
            display: block;
            margin-left: -250px;
        }
        100% {
            display: block;
            margin-left: 0;
        }
        
    }
    @keyframes HideNavigator {
        0% {
            display: block;
            margin-left: 0;
        }
        100% {
            display: block;
            margin-left: -250px !important;
        }
    }
    div#site-header-nav {
        div.row.navigator {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background-color: rgb(20, 20, 20);
            z-index: 3;
            display: flex;
            flex-direction: column;
            animation-duration: 300ms;
            animation-fill-mode: forwards;
            display: none;
            div.hide-navigator {
                position: absolute;
                top: 10px;
                right: 10px;
                display: flex;
                z-index: 3;
                a {
                    color: white !important;
                    padding: 7px;
                    font-size: 20px;
                }
            }
            div.navigator-logo{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 300px;
                div.img-wrap {
                    width: 200px;
                    img {
                        width: 100%;
                    }
                }
            }
            div.navigator-content {
                li {
                    border-bottom: 1px solid rgba(231, 225, 190, 0.26);
                    a {
                        color: white;
                        padding: 20px 0 20px 40px;
                    }
                    a:hover {
                        color: rgb(207, 216, 122);
                    }
                    a.is-active {
                        color: rgb(207, 216, 122);
                    }
                }
                
            }
        }
        div.show-nav-button {
            display: flex;
            justify-content: center;
            align-items: center;
            a {
                color: white;
                border: 2px solid white;
                border-radius: 5px;
                font-size: 25px;
                padding: 7px;
            }
        }
        div.site-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            div.site-logo-img-wrap {
                width: 200px;
                height: auto;
                img {
                    width: 100%;
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
            }
        }
        
    }
</style>

<script>
export default {
    name: 'SiteHeaderNavMobieNav',
    data() {
        return {
            links: this.$parent.links,
            navigator
        }
    },
    methods: {
        activeLink(currentLink) {
            this.links.forEach(link => {
                link.isActive = (link.title == currentLink.title);
            });
        },
        hideNavigator() {
            this.navigator.style.display = 'none';
        },
        showNavigator() {
            this.navigator.style.display = 'block';
        }
    },
    mounted() {
        this.navigator = this.$el.querySelector('#navigator');
    }
}
</script>
