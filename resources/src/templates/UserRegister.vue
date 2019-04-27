<template>
    <div id="userRegister">
        <div class="hero is-fullheight">
            <div class="hero-head">
                <site-header></site-header>
            </div>
            <div class="hero-body">
                <h1 class="title is-aileron-black is-2">Registe a new account</h1>
                <form class="user-register-form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                    <div class="field">
                        <label for="name" class="label">Name:</label>
                        <div class="control has-icons-left">
                            <input 
                                :class="{'input': true, 'is-danger': form.errors.has('name')}"
                                type="text" 
                                name="name" 
                                v-model="form.name">
                            <span class="icon is-left is-small">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</p>
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <div class="control has-icons-left">
                            <input 
                                :class="{'input': true, 'is-danger': form.errors.has('email')}" 
                                type="email" 
                                name="email" 
                                v-model="form.email">
                            <span class="icon is-left is-small">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('email')">{{ form.errors.get('email') }}</p>
                    </div>

                    <div class="field">
                        <label for="username" class="label">Username:</label>
                        <div class="control has-icons-left">
                            <input
                                :class="{'input': true, 'is-danger': form.errors.has('username')}" 
                                type="text" 
                                name="username" 
                                v-model="form.username">
                            <span class="icon is-left is-small">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('username')">{{ form.errors.get('username') }}</p>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password:</label>
                        <div class="control has-icons-left">
                            <input
                                :class="{'input': true, 'is-danger': form.errors.has('password')}" 
                                type="password" 
                                name="password" 
                                v-model="form.password">
                            <span class="icon is-left is-small">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('password')">{{ form.errors.get('password') }}</p>
                    </div>

                    <div class="field">
                        <label for="passowrd_confirmation" class="label">Confirm password:</label>
                        <div class="control has-icons-left">
                            <input
                                :class="{'input': true, 'is-danger': form.errors.has('password_confirmation')}" 
                                type="password" 
                                name="password_confirmation" 
                                v-model="form.password_confirmation">
                            <span class="icon is-left is-small">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('password_comfirmation')">{{ form.errors.get('name') }}</p>
                    </div>

                    <input type="hidden" name="role_id" v-model="form.role_id">

                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button type="submit" class="button btn-brown">Create New</button>
                        </div>
                        <div class="control">
                            <button type="reset" class="button is-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hero-foot">
                <site-footer></site-footer>
            </div>
        </div>
    </div>
</template>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'UserRegister',
    components: {
        SiteHeader,
        SiteFooter,
    },
    data() {
        return {
            form: new Form({
                role_id: 2,
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: ''
            })
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/register')
                .then(response => {
                    location.href = '/email/verify'
                })
                .catch(error => {
                    console.log(error)
                })
                .then(() => {
                    if(! this.form.errors.any()) {
                        location.href = '/email/verify'
                    }
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    #userRegister {
        .hero-head {
            background: #222;
            height: 150px;
        }
        .hero-body {
            padding: 100px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0 20px;
            .user-register-form {
                margin: 0 auto;
                width: 100%;
                max-width: 400px;
                .field {
                    .label {
                        font-family: 'aileron-black';
                    }
                }
            }
        }
    }
</style>