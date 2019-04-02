<template>
    <div id="userPasswordEmail">
        <div class="hero is-fullheight">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body">
                <h1 class="title">Forgot Password</h1>
                <div>
                    <form class="user-password-email-form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                        <div class="field has-addons has-addons-centered">

                            <div class="control has-icons-left">
                                <input
                                    :class="{'input': true, 'is-danger': form.errors.has('email')}" 
                                    type="email" 
                                    name="email" 
                                    placeholder="email@example.com"
                                    v-model="form.email">
                                <span class="icon is-left is-small">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>

                            <div class="control">
                                <button type="submit" class="button is-success" :disabled="form.errors.any()">Send Email</button>
                            </div>


                            <p class="help is-danger" v-if="form.errors.has('email')">{{ form.errors.get('email') }}</p>

                        </div>
                        
                        <div class="field">
                            <div class="control">
                                <p class="note has-text-centered">We will send a reset password email to your account. <br>Your request will be expired after 60 minutes!<br>please check your email soon!</p>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="success">
                    <p class="is-success" v-if="isSuccess">Sent email successfully!</p>
                </div>
            </div>
            <div class="hero-foot"><site-footer></site-footer></div>
        </div>
    </div>
</template>

<script>
import SiteHeader from '../components/SiteHeader.vue'
import SiteFooter from '../components/SiteFooter.vue'
export default {
    name: 'UserPasswordEmail',
    components: {
        SiteHeader,
        SiteFooter,
    },
    data() {
        return {
            form: new Form({
                email: ''
            }),
            isSuccess: false
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/password/email')
                     .then(response => {
                         this.isSuccess = true
                         this.form.reset()
                     })
                     .catch(error => {
                         console.log(error)
                     })
        }
    }
}
</script>

<style lang="scss" scoped>
    #userPasswordEmail {
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
        }
    }
</style>
