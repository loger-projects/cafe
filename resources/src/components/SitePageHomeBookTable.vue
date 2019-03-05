<template>
    <section id="sitePageHomeBookTable">
        <div class="container">
            <div class="columns">
                <div class="column title-wrap">
                    <div class="title is-pacifico text-yellow">Book a</div>
                    <div class="title is-1 is-aileron-black has-text-black-ter">TABLE</div>
                    <span>Opening Hour <strong>8:00</strong> AM - <strong>10:00</strong> PM, every day on week</span>
                </div>
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
        div.title-wrap {
            text-align: center;
            div:first-child {
                margin-bottom: 10px;
            }
            div:last-child {
                font-size: 54px;
            }
        }
    }
</style>

<script>
import SiteBaseBookTableForm from './SiteBaseBookTableForm.vue'

export default {
    name: 'SitePageHomeBookTable',
    components: {
        'book-table-form': SiteBaseBookTableForm
    }
}
</script>
