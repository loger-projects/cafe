<template>
    <section id="siteHeader" :class="{'is-sticky': isSticky}">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a class="navbar-item" :href="$root.siteInfo.origin">
                        <img :src="logo" width="112" height="28">
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div class="navbar-menu" id="navbarMenu">
                    <div class="navbar-start">
                        <div class="navbar-item">Home</div>
                        <div class="navbar-item">Menu</div>
                        <div class="navbar-item">Product</div>
                        <div class="navbar-item">AboutUs</div>
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="icons">
                                <span class="icon is-medium"><i class="fas fa-shopping-cart"></i></span>
                                <span class="icon is-medium"><i class="fas fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #siteHeader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 3;
        transition: 0.5s;
        transition-timing-function: ease-in-out;
        .navbar {
            .navbar-menu {
                .navbar-item {
                    background-color: transparent;
                    &.has-dropdown {
                        &:hover {
                            .navbar-link {
                                background-color: transparent;
                            }
                        }
                        &.is-active {
                            .navbar-link {
                                background-color: transparent;
                            }
                        }
                    }
                }
            }
        }
        &:not(.is-sticky) {
            background-color: transparent;
            .navbar {
                .navbar-menu {
                    .navbar-item {
                        color: white;
                        &:hover {
                            background-color: rgba(3, 3, 3, 0.7);
                        }
                        &.has-dropdown {
                            .navbar-dropdown {
                                background-color: transparent;
                            }
                        }
                    }
                }
            }
        }
        &.is-sticky {
            background-color: #fff;
            .navbar {
                .navbar-menu {
                    .navbar-item {
                        color: black;
                        &:hover {
                            background-color: rgb(214, 214, 214);
                        }
                        .navbar-dropdown {
                            background-color: #fff;
                        }
                    }
                }
            }
        }
    }
</style>

<script>
export default {
    name: 'SiteHeader',
    data() {
        return {
            isSticky: false,
        }
    },
    computed: {
        logo() {
            return this.$root.siteInfo.logoWhite;
        }
    },
    mounted() {
        window.addEventListener('scroll', event => {
            let headerHeight = document.getElementById('siteHeader').offsetHeight;
            if (window.scrollY >= headerHeight ) {
                this.isSticky = true;
                this.logo = this.$root.siteInfo.logoBlack;
            } else {
                this.isSticky = false;
                this.logo = this.$root.siteInfo.logoWhite;
            }
        });
    }
}
</script>