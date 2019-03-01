<template>
    <div class="columns has-background-grey-darker has-text-light">
        <div class="column">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a class="navbar-item"><img src="/img/SiteHeaderNavLogoBlack.png" alt="No Avatar" width="112" height="28"></a>
                    <a role="button" :class="{'navbar-burger': true, 'is-active': crossNavbarBurger}" aria-label="menu" aria-expanded="false" @click="toggleNavbar">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div :class="{'navbar-menu': true, 'is-active': showNavbar}">
                    <div class="navbar-start">
                        <a class="navbar-item">
                            Home
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable is-right">
                            <a class="navbar-link">Is Hoverable</a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item">Docs asd as dasd asa sd</a>
                                <a class="navbar-item">Logo asd asd as sa das d</a>
                                <a class="navbar-item">ABC asd as dsa dsa das d</a>
                            </div>
                        </div>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <!-- <a :class="{'navbar-link': dropdown, 'navbar-item': !dropdown}" @click="dropdown = !dropdown">Documentation</a> -->
                            <a class="navbar-link" @click="dropdown = !dropdown">Documentation</a>
                            <div class="navbar-dropdown" v-show="dropdown">
                                <a class="navbar-item">agnorithem</a>
                                <div class="navbar-divider"></div>
                                <a class="navbar-item">Logicial</a>
                                <a class="navbar-item">gapless</a>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-primary">
                                    <strong>Sign Up</strong>
                                </a>
                                <a class="button is-light">
                                    Sign In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

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
