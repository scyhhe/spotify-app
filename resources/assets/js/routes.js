import Login from './components/Login/Login.vue'
import Home from './components/Home/Home.vue'
import Playlists from './components/Playlists/Playlists.vue'
import Playlist from './components/Playlists/Playlist.vue'
import Search from './components/Search/Search.vue'

import NotFound from './components/NotFound.vue'

export const routes = [
	{ path: '/', name: 'login', component: Login },
	{
		path: '/home',
		name: 'home',
		component: Home,
		meta: {
			auth: true
		}
	},
	{
		path: '/playlists',
		name: 'playlists',
		component: Playlists,
		meta: {
			auth: true
		},
		children: [
			{
				path: ':id',
				name: 'playlist',
				component: Playlist,
			},
		]
	},
	{
		path: '/search',
		name: 'songs',
		component: Search,
		meta: {
			auth: true
		}
	},
	{
		path: '/404',
		component: NotFound,
		name: '404',
	},
	{
		path: '*',
		redirect: '404'
	}
]