<template>
    <section>
        <admin-header></admin-header>
        <div class="columns is-multiline is-gapless my-custom-div">
            <div class="column is-5">Column 5</div>
            <div class="column is-7">column</div>
            <div class="column">Column</div>
            <div class="column">Column</div>
            <div class="column is-12">Column 12: .columns.is-gapless:not(:last-child) { margin-bottom: 1.5rem; }</div>
        </div>
        <div class="columns has-background-success has-text-danger">
            <div class="column">No Gap</div>
            <div class="column">No Gap</div>
            <div class="column">No Gap</div>
        </div>
        <div class="columns has-background-grey-dark has-text-primary">
            <div class="column">No Gap</div>
            <div class="column">No Gap</div>
            <div class="column">No Gap</div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    div.my-custom-div {
        div.column {
            background-color: greenyellow;
            padding-top: 30px !important;
            padding-bottom: 30px !important;
        }
    }
</style>

<script>
import AdminHeader from '../components/AdminHeader.vue'

export default {
    name: 'AdminPageHome',
    components: {
        'admin-header' :AdminHeader
    },
    data() {
        return {
            
        }
    }
}
</script>
