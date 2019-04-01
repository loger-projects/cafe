<template>
    <div id="userLogin">
        <div class="hero is-fullheight">
            <div class="hero-head">
                <site-header></site-header>
            </div>
            <div class="hero-body">
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
                            <input type="checkbox" name="checkbox" v-model="form.checkbox">
                            Remember me
                        </label>
                    </div>

                    <div class="field has-addons">
                        <div class="control">
                            <button type="submit" class="button is-success" :disabled="form.errors.any()">Login</button>
                        </div>
                        <div class="control">
                            <a href="#" class="button is-text" role="button">Forgot your password</a>
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
    methods: {
        onSubmit() {
            this.form.post('/login')
                .then(response => {
                    location.href="/user/home"
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
            background-color: #d0e1d4;
            padding: 100px 0;
            display: flex;
            justify-content: center;
            .user-login-form {
                margin: 0 auto;
            }
        }
    }
</style>