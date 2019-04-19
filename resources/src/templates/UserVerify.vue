<template>
    <div id="userVerify">
        <div class="hero is-fullheight">
            <div class="hero-head"><site-header></site-header></div>
            <div class="hero-body">
                <div class="has-text-success">
                    A fresh verification link has been sent to your email address.
                </div>
                <div>
                    Before proceeding, please check your email for a verification link.
                </div>
                <div>
                    If you did not receive the email, <a :href="href" class="button is-text" role="button">click here to request another</a>.
                </div>
                <div>
                    <button class="button is-text" @click="logout">Log out</button>
                </div>
                <div style="visibility: hidden; display: none;">
                    <form action="/logout" method="post">
                        <input type="hidden" name="_token" v-model="csrf">
                    </form>
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
    name: 'UserVerify',
    components: {
        SiteHeader,
        SiteFooter
    },
    computed: {
        href() { return location.origin + '/email/verify' },
        csrf() { return document.querySelector("meta[name='csrf-token']").getAttribute('content') }
    },
    methods: {
        logout() {
            document.querySelector('form').submit();
        }
    }
}
</script>

<style lang="scss" scoped>
    #userVerify {
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