<template>
    <div class="has-text-centered is-centered">
        <h1 class="title is-2">
            Sadly, we couldn't find this page. <i>Please</i> check your typing, or if you navigated here somehow please let us know.
        </h1>
        <a class="button is-success is-medium" @click="redirect">
            <span class="icon is-medium">
                <i class="fas fa-home"></i>
            </span>
            <span>To Login Page</span>
        </a>
    </div>
</template>

<script>
    export default {

        methods: {
            redirect() {
                // this.$store.commit('setAutoLogin', false)
                this.$router.replace({ name: this.$store.getters.isLoggedIn ? 'home' : 'login' })
            }
        }
    }
</script>
