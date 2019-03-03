<template>
    <section id="admin-header">
    <div class="container">
    <div class="columns">
    <div class="column">
        <nav class="navbar">
            <div class="navbar-brand">
                <a class="navbar-item" href="http://cafe.div">
                    <img src="/img/SiteHeaderNavLogoBlack.png" alt="No Image">
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample" @click="showNavbar = !showNavbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div :class="{'navbar-menu': true, 'is-active': showNavbar}">
                <div class="navbar-start">
                    <a href="http://cafe.div" class="navbar-item">Home</a>
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
                            <a class="button is-primary"><strong>Sign Up</strong></a>
                            <a class="button is-light">Sign In</a>
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
    section#admin-header {
        border-bottom: 1px solid #222;
    }
</style>

<script>
export default {
    name: 'AdminHeader',
    data() {
        return {
            crossNavbarBurger: false,
            showNavbar: false,
            dropdown: false
        }
    },
    methods: {
        toggleNavbar() {
            this.crossNavbarBurger = !this.crossNavbarBurger;
            this.showNavbar = !this.showNavbar;
        }
    }
}
</script>
