<template>
    <section id="siteHeader" :class="{'is-sticky': isSticky, 'is-bg-white': isBgWhite }">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a class="navbar-item" :href="origin">
                        <img :src="logo" width="112" height="28">
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" @click="isActive = !isActive">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div :class="{'navbar-menu': true, 'is-active': isActive}" id="navbarMenu">
                    <div class="navbar-start">
                        <div :class="{'navbar-item': true, 'has-dropdown is-hoverable': item.hasDropdown}" v-for="item in navbar" :key="item.id">
                            <a :href="item.link" :class="{'navbar-link': item.hasDropdown}" v-text="item.text"></a>
                            <div class="navbar-dropdown" v-if="item.hasDropdown">
                                <div class="navbar-item" v-for="subItem in item.dropdown" :key="subItem.id">
                                    <a :href="subItem.link" v-text="subItem.text"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <span class="icon is-medium"><i class="fas fa-shopping-cart"></i></span>
                            <span class="icon is-medium"><i class="fas fa-user"></i></span>
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
        &.header-border-bottom {
            border-bottom: 1px solid #181818;
        }
        .navbar {
            background-color: transparent;
            .navbar-brand {
                .navbar-item {
                    &:hover {
                        background-color: transparent;
                    }
                }
            }
            .navbar-menu {
                background-color: transparent;
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
                .navbar-start {
                    justify-content: flex-end;
                    margin-right: 0;
                    margin-left: auto;
                }
                .navbar-end {
                    margin-left: 0;
                }
            }
        }
        &:not(.is-sticky) {
            background-color: transparent;
            .navbar {
                .navbar-menu {
                    .navbar-start {
                        .navbar-item {
                            a {
                                color: white;
                            }
                            &:hover {
                                background-color: rgba(3, 3, 3, 0.7);
                            }
                            &.has-dropdown {
                                .navbar-link {
                                    color: white;
                                }
                                .navbar-dropdown {
                                    background-color: transparent;
                                }
                            }
                        }
                    }
                    .navbar-end {
                        .navbar-item {
                            color: white;
                            span {
                                &:hover {
                                    background-color: rgba(3, 3, 3, 0.7);
                                }
                            }
                        }
                    }
                    &.is-active {
                        background-color: rgba(41, 40, 40, 0.37);
                        .navbar-start {
                            .navbar-item {
                                &:hover {
                                    background-color: transparent;
                                }
                                &.has-dropdown {
                                    &:hover {
                                        background-color: transparent;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        &.is-sticky, &.is-bg-white {
            background-color: #fff;
            .navbar {
                .navbar-menu {
                    .navbar-start {
                        .navbar-item {
                            a {
                                color: black;
                            }
                            &:hover {
                                background-color: rgb(214, 214, 214);
                            }
                            &.has-dropdown {
                                .navbar-link {
                                    color: black;
                                }
                                .navbar-dropdown {
                                    background-color: #fff;
                                }
                            }
                        }
                    }
                    .navbar-end {
                        .navbar-item {
                            color: black;
                            span {
                                &:hover {
                                    background-color: rgb(214, 214, 214);
                                }
                            }
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
    props: {
        isBgWhite: {
            default: false,
            type: Boolean
        }
    },
    data() {
        return {
            isSticky: false,
            isActive: false,
            navbar: [
                {link: this.origin, text: 'Home', hasDropdown: false},
                {link: '#', text: 'Menu', hasDropdown: false},
                {link: '#', text: 'Product', hasDropdown: false},
                {link: '#', text: 'About', hasDropdown: false},
                {link: '#', text: 'Post Type', hasDropdown: true, 
                    dropdown: [
                        {link: '#', text: 'Full width'},
                        {link: '#', text: 'Right Sidebar'},
                        {link: '#', text: '3 Columns'}
                    ]
                },
            ]
        }
    },
    computed: {
        origin() {
            return location.origin;
        },
        logoWhite() {
            return location.origin + '/img/SiteHeaderLogoWhite.jpg';
        },
        logoBlack() {
            return location.origin + '/img/SiteHeaderLogoBlack.jpg';
        },
        logo() {
            return this.isSticky ? this.logoBlack : this.logoWhite;
        },
    },
    mounted() {
        window.addEventListener('scroll', event => {
            let headerHeight = document.getElementById('siteHeader').offsetHeight;
            if (window.scrollY >= headerHeight ) {
                this.isSticky = true;
                document.getElementById('siteHeader').classList.add('header-border-bottom');
            } else {
                this.isSticky = false;
                document.getElementById('siteHeader').classList.remove('header-border-bottom');
            }
        });
    }
}
</script>