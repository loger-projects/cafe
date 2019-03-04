<template>
    <section id="bulma-header" :class="{'is-sticky': isSticky}">
    <div class="container">
    <div class="columns">
    <div class="column">
        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-item" href="http://cafe.div/bulma">
                    <img :src="logo" alt="No Image" width="112" height="28">
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" @click="showNavbar = !showNavbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div :class="{'navbar-menu': true, 'is-active': showNavbar}">
                <div class="navbar-start">
                    <a href="http://cafe.div/bulma" class="navbar-item">Home</a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Dropdown Menu</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">Menu Light</a>
                            <a class="navbar-item">Menu Dark</a>
                            <a class="navbar-item">Menu Green</a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">Documentation</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">DocType 1</a>
                            <a class="navbar-item">DocType 2</a>
                            <a class="navbar-item">DocType 3</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-success has-text-black"><strong>Sign Up</strong></a>
                            <a class="button is-light has-text-black">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    </div>
    </div>
    </section>
</template>

<style lang="scss" scoped>
    section#bulma-header {
        border-bottom: 1px solid rgba(34, 34, 34, 0.603);
        position: fixed;
        top: 0;
        left: 0;
        transition: 0.5s;
        width: 100%;
        z-index: 3;
        &:not(.is-sticky) {
            a {
                color: white;
                &:hover {
                    background-color: rgba(31, 31, 31, 0.767);
                }
            }
            .navbar-item.has-dropdown:hover {
                background-color: transparent;
                .navbar-link {
                    background-color: transparent;
                    &:hover {
                        background-color: rgba(31, 31, 31, 0.767);
                    }
                }
            }
            .navbar-item.has-dropdown.is-active .navbar-link {
                background-color: transparent;
                &:hover {
                    background-color: rgba(31, 31, 31, 0.767);
                }
            }
            .navbar-dropdown {
                background-color: transparent;
            }
        }
        &.is-sticky {
            background-color: #fff;
            a {
                color: #000;
                &:hover {
                    background-color: rgba(150, 150, 150, 0.616);
                }
            }
            div.navbar-menu {
                background-color: #fff;
            }
        }
    }
</style>

<script>
export default {
    name: 'BulmaHeader',
    data() {
        return {
            crossNavbarBurger: false,
            showNavbar: false,
            dropdown: false,
            isSticky: false,
            logo: '/img/SiteHeaderNavLogoWhite.png',
        }
    },
    methods: {
        toggleNavbar() {
            this.crossNavbarBurger = !this.crossNavbarBurger;
            this.showNavbar = !this.showNavbar;
        }
    },
    mounted() {
        window.addEventListener('scroll', event => {
            const scrollY = window.scrollY;
            const headerHeight = document.getElementById('bulma-header').offsetHeight;
            if (scrollY >= headerHeight) {
                this.isSticky = true;
                this.logo = '/img/SiteHeaderNavLogoBlack.png'
            } else {
                this.isSticky = false;
                this.logo = '/img/SiteHeaderNavLogoWhite.png'
            }
        })
    }
}
</script>
