<template>
    <div id="formVue">
        <div class="container">
            <div class="title has-text-centered" v-if="success.message">{{ success.message }}</div>
            <form @submit.prevent="onSubmit">

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="name" placeholder="Loger Nam" v-model="name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="errors.name">{{ errors.name[0] }}</p>
                </div>


                <div class="field">
                    <label class="label">Description</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" name="description" placeholder="if the world is an eggm I will eat that egg" v-model="description">
                        <span class="icon is-small is-left">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="errors.description">{{ errors.description[0] }}</p>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-success">Submit</button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button is-info">Reset</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</template>

<style lang="scss">
    #formVue {
        height: 100vh;
        background-color: #333;
        position: relative;
        div.title {
            color: rgb(91, 218, 87);
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 50px;
            background-color: #c2c2c2;
            p.help {
                font-size: 2rem;
            }
            p.help.is-success {
                color: rgb(91, 218, 87);
            }
        }
    }
</style>

<script>
class Error {
    any() {

    }

    clear() {

    }
}

export default {
    name: "FormVue",
    data() {
        return {
            name: '',
            description: '',
            success: {},
            errors: new Error()
        }
    },
    methods: {
        onSubmit() {
            axios.post('/form-vue/store', {
                name: this.name,
                description: this.description
            }).then(response => {
                alert(response.data.message)
                this.errors.clear()
            }).catch(error => {
                this.errors.get(error.response.data)
            })
        }
    }
}
</script>
