<template>
    <section id="sitePageHomeBookTable">
        <div class="container">
            <div class="columns">
                <home-title class="column">
                    <template slot="firstTitle">Book a</template>
                    <template slot="secondTitle">TABLE</template>
                    <template slot="footer">
                        <span>Opening Hour <strong>8:00</strong> AM - <strong>10:00</strong> PM, every day on week</span>
                    </template>
                </home-title>
            </div>
            <div class="columns">
                <div class="column">
                    <book-table-form></book-table-form>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    #sitePageHomeBookTable {
        padding-top: 50px;
    }
</style>

<script>
import SiteBaseBookTableForm from './SiteBaseBookTableForm.vue'
import SitePageHomeTitle from './SitePageHomeTitle.vue'

export default {
    name: 'SitePageHomeBookTable',
    components: {
        'book-table-form': SiteBaseBookTableForm,
        'home-title': SitePageHomeTitle
    }
}
</script>
