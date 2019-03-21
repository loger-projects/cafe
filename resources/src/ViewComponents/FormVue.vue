<template>
    <div id="formVue">
        <div class="container">
            <form @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="name" placeholder="Loger Nam" v-model="name">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="errors.has('name')">{{ errors.get('name') }}</p>
                </div>


                <div class="field">
                    <label class="label">Description</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" name="description" placeholder="if the world is an eggm I will eat that egg" v-model="description">
                        <span class="icon is-small is-left">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                    <p class="help is-danger" v-if="errors.has('description')">{{ errors.get('description') }}</p>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-success" :disabled="errors.any()">Submit</button>
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
class Errors {
    constructor() {
        this.errors = {}
    }

    record(errors) {
        this.errors = errors
    }

    get(field) {
        if(this.errors[field]) {
            return this.errors[field][0]
        }
    }

    has(field) {
        return this.errors.hasOwnProperty(field)
    }

    any() {
        return Object.keys(this.errors).length > 0
    }

    clear(field) {
        if(this.errors[field]) {
            delete this.errors[field]
        }
    }
}

class Form {
    constructor(data) {
        this.originalData = data
        this.data = 'original Data'
    }

    get() {
        return this.data
    }
}



export default {
    name: "FormVue",
    data() {
        return {
            name: '',
            description: '',
            errors: new Errors(),
            form: new Form()
        }
    },
    methods: {
        onSubmit() {
            axios.post('/form-vue', this.$data)
                .then(response => {
                    alert(response.data.message)
                    this.name = ''
                    this.description = ''
                }).catch(error => this.errors.record(error.response.data.errors))
        }
    },
    created() {
        var obj = {
            data: 42,
            get() {
                return this.data
            }
        }
        // inherit and not inherit
        // childObj 
        var childObj = obj // cái này thì là inherit rồi
        childObj.data = 16
        console.log(obj.data)
    }
}
// Note: event DOM - Oject DOM - String DOM
// Very Important: Review Javascript Class - Object base knowledge
</script>