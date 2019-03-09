<template>
    <div id="siteMenuDinner">
        <p class="title is-1">Dinner</p>
    </div>
</template>

<style lang="scss" scoped>
    #siteMenuDinner {
        margin: 0 auto;
    }
</style>

<script>
export default {
    name: 'SiteMenuDinner',
    computed: {
        origin() {
            return this.$root.siteInfo.origin;
        }
    },
    mounted() {
        axios.get(this.origin + '/menu/get/dinner')
             .then(response => {
                 console.log(response)
             })
             .catch(response => {
                 console.log(response)
             });
    }
}
</script>