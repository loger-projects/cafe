<template>
    <div id="userLogin">
        <div class="hero is-fullheight">
            <div class="hero-head">
                <site-header></site-header>
            </div>
            <div class="hero-body">
                <h1 class="title is-aileron-black is-2">Login</h1>
                <form @submit.prevent="onSubmit" class="user-login-form" @keydown="form.errors.clear($event.target.name)">
                    <div class="field">
                        <label for="username" class="label">Username:</label>
                        <div class="control">
                            <input type="text" :class="{'input': true, 'is-danger': form.errors.has('username')}" name="username" v-model="form.username">
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('username')">{{ form.errors.get('username') }}</p>
                    </div>

                    <div class="field">
                        <label for="password" class="label">Password:</label>
                        <div class="control">
                            <input :class="{'input': true, 'is-danger': form.errors.has('password')}" type="password" name="password" v-model="form.password">
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('password')">{{ form.errors.get('password') }}</p>
                    </div>

                    <div class="field">
                        <label for="remember" class="checkbox">
                            <input type="checkbox" name="remember" v-model="form.checkbox">
                            Remember me
                        </label>
                    </div>

                    <div class="field has-addons">
                        <div class="control">
                            <button type="submit" class="button btn-brown" :disabled="form.errors.any()">Login</button>
                        </div>
                        <div class="control">
                            <a :href="forgotPasswordLink" class="button is-text" role="button">Forgot your password</a>
                        </div>
                    </div>
                    <div class="field register-field">
                        <a :href="registerLink" class="button is-text" role="button">Register New user</a>
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
    name: 'UserLogin',
    components: {
        SiteHeader,
        SiteFooter,
    },
    data() {
        return {
            form: new Form({
                username: '',
                password: '',
                checkbox: false
            })
        }
    },
    computed: {
        forgotPasswordLink() { return location.origin + '/password/reset' },
        registerLink() { return location.origin + '/register'},
    },
    methods: {
        onSubmit() {
            this.form.post('/login')
                .then(response => {
                    location.href = this.$root.previousURL
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }
}
</script>

<style lang="scss" scoped>
    #userLogin {
        .hero-head {
            background: #222;
            height: 150px;
        }
        .hero-body {
            padding: 100px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            .user-login-form {
                margin: 0 auto;
                .field {
                    .label {
                        font-family: 'aileron-black';
                    }
                    &.register-field {
                        text-align: center;
                    }
                }
            }
        }
    }
</style>