<template>
    <div class="siteMenuIngredient">
        <div class="columns is-multiline">
            <div class="column is-3" v-for="ingredient in ingredients" :key="ingredient.id">
                {{ ingredient.name }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SiteMenuIngredient',
    props: ['menuID'],
    data() {
        return {
            ingredients: null
        }
    },
    mounted() {
        axios.get('/'+this.menuID+'/menu/get/ingredients')
             .then(response => {
                 this.ingredients = response.data;
             })
             .catch(response => {
                 console.log(response)
             });
    }
}
</script>
