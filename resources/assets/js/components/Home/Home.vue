<template>
	<div  v-if="!checkProfile">
		<app-profile :data="getProfile"></app-profile>
	</div>
	<div v-else>
		<h1 class="title is-1">Couldn't load your profile</h1>
	</div>
</template>

<script>
	import Profile from './Profile.vue'
	import { mapGetters, mapMutations, mapActions } from 'vuex'

	export default {
		name: 'home',
		components: {
			appProfile: Profile
		},
		methods: {
			...mapMutations([
				'logUserIn',
				'toggleLoading'
			]),
		},
		computed: {
			...mapGetters([
				'getProfile',
				'isLoggedIn'
			]),
			checkProfile() {
				return _.isEmpty(this.getProfile)
			}
		},
	};
</script>