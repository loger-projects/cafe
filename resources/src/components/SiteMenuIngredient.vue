<template>
    <div class="siteMenuIngredient">
        <div class="columns is-multiline">
            <div class="column is-3" v-for="ingredient in ingredients" :key="ingredient.id">
                {{ ingredient.name }}
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .siteMenuIngredient {
        .columns {
            .column {
                position: relative;
                &::before {
                    content: '';
                    position: absolute;
                    top: 80%;
                    left: 0;
                    transform: translate(-130%, -50%);
                    border: none;
                    width: 10px;
                    height: 2px;
                    background-color: rgb(110, 110, 110);
                }
            }
        }
    }
</style>

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
