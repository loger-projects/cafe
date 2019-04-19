<template>
    <div id="userPasswordReset">
        <div class="hero is-fullheight">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body">
                <h1 class="title">Reset Password</h1>
                <form class="user-password-reset-form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                    <input type="hidden" name="token" v-model="form.token">

                    <div class="field">
                        <div class="control has-icons-left">
                            <input
                                :class="{'input': true, 'is-danger': form.errors.has('email')}"
                                type="email" 
                                name="email"
                                placeholder="email@example.com"
                                v-model="form.email">

                            <span class="icon is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('email')">{{ form.errors.get('email') }}</p>
                    </div>

                    <div class="field">
                        <div class="control has-icons-left">
                            <input 
                                :class="{'input': true, 'is-danger': form.errors.has('password')}"
                                type="password" 
                                name="password"
                                v-model="form.password">
                            <span class="icon is-left is-small">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('password')">{{ form.errors.get('password') }}</p>
                    </div>

                    <div class="field">
                        <div class="control has-icons-left">
                            <input 
                                :class="{'input': true, 'is-danger': form.errors.has('password_confirmation')}"
                                type="password" 
                                name="password_confirmation"
                                v-model="form.password_confirmation">
                            <span class="icon is-left is-small">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <p class="help is-danger" v-if="form.errors.has('password_confirmation')">{{ form.errors.get('password_confirmation') }}</p>
                    </div>

                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-success" :disabled="form.errors.any()">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hero-foot"><site-footer></site-footer></div>
        </div>
    </div>
</template>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SiteFooter from '../components/SiteFooter.vue'

export default {
    name: 'UserPasswordReset',
    components: {
        SiteHeader,
        SiteFooter
    },
    data() {
        return {
            form: new Form({
                token: token,
                email: '',
                password: '',
                password_confirmation: ''
            })
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/password/reset')
                     .then(response => {
                         location.href = "/user/home"
                     })
                     .catch(error => {
                         console.log(error)
                     })
        }
    }
}
</script>

<style lang="scss" scoped>
    #userPasswordReset {
        .hero-head {
            background: #222;
            height: 150px;
        }
        .hero-body {
            background-color: #d0e1d4;
            padding: 100px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            div {
                margin-bottom: 10px;
            }
            form.user-password-reset-form {
                width: 100%;
                max-width: 350px;
            }
        }
    }
</style>