<template>
		<div class="hero-head has-background-dark">
			 <div class="container navbar">
		  		<router-link :to="{ name: 'home' }" activeClass="active">
		  			<a class="navbar-item">Home</a>
		  		</router-link>
		  		<router-link :to="{ name: 'playlists' }" activeClass="active">
		  		     <a class="navbar-item">Playlists</a>
		  		</router-link>   
		  		<router-link :to="{ name: 'songs' }" activeClass="active">
		  		     <a class="navbar-item">Find a song</a>
		  		</router-link>
		  		<router-link :to="{ name: 'login' }" id="logout">
		  		     <a class="navbar-item is-danger media-right" @click="logout()">Logout</a>
		  		</router-link>

		    </div>
		</div>
</template>

<script>
	import { mapMutations } from 'vuex'
	
	export default {
		methods:  {
			...mapMutations([
				'logout'
			])
		}
	};
</script>

<style scoped>
	.hero-head {
		padding: 24px;
	}
	div.navbar {
		display: flex;
		flex-direction: row;
	}
	a.navbar-item {
		font-size: 1.8em;
		margin: 5px;
		color: #000;
		opacity: 0.3;
	}
	a.navbar-item:first-child {
		margin-left: 10px;
	}
	.active {
		color: #fff;
	}
	.active a {
		opacity: 1;
		color: #fff;
		border-bottom: 2px solid rgba(255, 255, 255, 0.6)
	}
	#logout {
		margin-left: auto;
	}
</style>