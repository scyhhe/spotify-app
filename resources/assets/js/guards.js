export const guards = {

	ifAuthenticated: (to, from, next) => {
		if (store.getters.isLoggedIn) {
			next()
			return
		}
		next({ name: 'login'})
	},

	ifNotAuthenticated: (to, from, next) => {
		if (!store.getters.isLoggedIn) {
			next()
			return
		}
		next({ name: 'home'})
	}
};