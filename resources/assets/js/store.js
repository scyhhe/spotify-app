export default {
	state: {
		isLoading: false,
		isAuthenticated: false,
		autoLogin: true,
		profile: {},
	},
	getters: {
		getProfile: state => state.profile,
		isLoggedIn: state => state.isAuthenticated,
		isLoading: state => state.isLoading,
		isAutoLogin: state => state.autoLogin
 	},
	mutations: {
		logUserIn(state, payload) {
				state.isAuthenticated = true
				this.commit('setProfile', payload.user)
				payload.router.replace({ name: 'home' })
		},
		logout(state) {
			state.isAuthenticated = false
		},
		setAutoLogin(state, payload = true) {
			state.autoLogin = payload
		},
		setProfile(state, payload) {
			state.profile = Object.assign({}, state.profile , payload)
		},
		toggleLoading(state) {
			state.isLoading = !state.isLoading
		},
	},
}