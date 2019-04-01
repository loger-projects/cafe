<template>
    <div id="userHome">
        <ul>
            <li>
                <a href="http://cafe.div">home</a>
            </li>
            <li><a @click="onClick">Logout</a></li>
        </ul>
        <form action="/logout" method="post">
            <input type="hidden" name="_token" v-model="csrf">
        </form>
    </div>
</template>

<script>
export default {
    name: 'UserHome',
    computed: {
        csrf() {
            return document.querySelector("meta[name='csrf-token']").getAttribute('content')
        }
    },
    methods: {
        onClick() {
            document.querySelector('form').submit();
        }
    }
}
</script>
