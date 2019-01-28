
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Buefy from 'buefy'
import FontAwesome from '@fortawesome/fontawesome-free/js/all.js'
import InstantSearch from 'vue-instantsearch';

import VueLocalStorage from 'vue-localstorage'
import VueCookie from 'vue-cookie'
import VueRouter from 'vue-router'
import Vuex from 'vuex'


import App from './App.vue'

import { routes } from './routes'
import centralStore from './store'

window._ = require('lodash')
window.axios = require('axios')
window.Vue = require('vue')
window.Moment = require('moment')

console.log('I am working :)')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Buefy)
Vue.use(InstantSearch)
Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueLocalStorage)
Vue.use(VueCookie)

const store = new Vuex.Store(centralStore)
const router = new VueRouter({
	mode: 'history',
	routes
})

router.beforeEach( (to,from, next) => {
    if (from.meta.auth && to.path == '/') {
        console.log('coming from logout')
        store.commit('setAutoLogin', false)
    }

    console.table(to.matched)
    

	if (to.matched.some(record => record.meta.auth)) {
        if (store.getters.isLoggedIn) {
            next()
        } else {
            store.commit('setAutoLogin', false)
            next({ name: 'login' })
        }
    }

    next()    
})

const app = new Vue({
	el: '#app',
    router,
    store,
    render: h => h(App)
})
