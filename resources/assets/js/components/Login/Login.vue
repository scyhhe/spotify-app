<template>
	<div class="is-centered">
		<div class="container has-text-centered">
			<a class="has-shadow button is-success is-inverted is-rounded is-large" href="/auth">
				<i class="fab fa-spotify" style="margin-right: 5px"></i>
				<span>Login</span>
			</a>
		</div>
	</div>
</template>
<script>
	import { mapGetters } from 'vuex'

	export default {
		created() {
			if (this.$store.getters.isAutoLogin) {
				this.$store.commit('toggleLoading')
				this.attemptLogin()
			}
		},
		methods: {
			attemptLogin() {
				axios.get('/profile')
					.then(response => {
						this.$store.commit('toggleLoading')
						response.data.router = this.$router
						this.$store.commit('logUserIn', response.data)
						this.$router.replace({ name: 'home'})
					})
					.catch(err => {
						console.error(err)
						if (this.$store.getters.isLoading) {
							this.$store.commit('toggleLoading')
						}
					})
					.then(fallback => console.log('always executed'))
			}
		},
	};
</script>

<style scoped>
	a.button {
		transition: 0.5s;
		margin-top: 50px;
	}
</style>
