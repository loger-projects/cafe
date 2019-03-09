<template>
    <section id="sitePageHomeMenu">
        <div class="menu-head">
            <div class="hero is-medium">
                <div class="hero-body has-text-centered">
                    <home-title isTextWhite="true">
                        <template slot="firstTitle">Our</template>
                        <template slot="secondTitle">Menu</template>
                    </home-title>
                </div>
                <div class="hero-foot">
                    <div class="tabs is-centered is-boxed">
                        <ul>
                            <li v-for="tab in tabList" :key="tab.id" :class="{'is-active': tab.isActive}">
                                <a @click="activeTab(tab)" :class="{'has-text-white': !tab.isActive, 'has-text-black': tab.isActive}">
                                    <span class="icon is-small"><i :class="tab.icon"></i></span>
                                    <span>{{ tab.name }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-body">
            <div class="container">
                <component :is="componentID"></component>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #sitePageHomeMenu {
        padding-top: 100px;
        text-align:center;
        .menu-head {
            background-image: url('/img/MenuHeadBackground.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: 50% 50%;
            div.hero {
                background-color: #00000086;
                div.hero-foot {
                    ul {
                        li:hover {
                            background-color: transparent !important;
                        }
                    } 
                }
            }
        }
    }
</style>

<script>
import SitePageHomeTitle from './SitePageHomeTitle.vue'
import SiteMenuMealBreakfast from './SiteMenuMealBreakfast'
import SiteMenuMealLunch from './SiteMenuMealLunch.vue'
import SiteMenuMealDinner from './SiteMenuMealDinner.vue'

export default {
    name: 'SitePageHomeMenu',
    components: {
        'home-title': SitePageHomeTitle,
        'menu-breakfast': SiteMenuMealBreakfast,
        'menu-lunch': SiteMenuMealLunch,
        'menu-dinner': SiteMenuMealDinner
    },
    data() {
        return {
            tabList: [
                {name: 'Breakfast', isActive: true, icon: 'fas fa-coffee', componentID: 'menu-breakfast'},
                {name: 'Lunch', icon: 'fas fa-hamburger', isActive: false, componentID: 'menu-lunch'},
                {name: 'Dinner', icon: 'fas fa-utensils', isActive: false, componentID: 'menu-dinner'}
            ],
            componentID: 'menu-breakfast'
        }
    },
    methods: {
        activeTab(currentTab) {
            this.tabList.forEach(tab => {
                tab.isActive = (tab.name == currentTab.name)
            });
            this.componentID = currentTab.componentID;
        }
    }
}
</script>