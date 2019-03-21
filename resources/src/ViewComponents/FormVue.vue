<template>
    <div id="formVue">
        <div class="container">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="name" placeholder="Loger Nam" v-model="form.name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</p>
                </div>


                <div class="field">
                    <label class="label">Description</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" name="description" placeholder="if the world is an eggm I will eat that egg" v-model="form.description">
                        <span class="icon is-small is-left">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="form.errors.has('description')">{{ form.errors.get('description') }}</p>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-success" :disabled="form.errors.any()">Submit</button>
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
            .help {
                font-size: 1rem;
            }
        }
    }
</style>

<script>
export default {
    name: "FormVue",
    data() {
        return {
            form: new Form({
                name: '',
                description: '',
            })
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/form-vue')
                .then(response => {
                    console.log(response.message)
                })
                .catch(error => {
                    console.log(error.message)
                })
        }
    }
}
// Note: event DOM - Oject DOM - String DOM
// Very Important: Review Javascript Class - Object base knowledge
</script>