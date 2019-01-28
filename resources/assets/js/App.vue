<template>
	<div id="fullheight">
		
		<loading
			:active.sync="isLoading"
		></loading>
		
		<div class="wrapper" :class="{ 'max-height': isLoggedIn }">
			<div v-if="isLoggedIn">
				<app-nav></app-nav>
			</div>
			<!-- <hr> -->
			<div class="hero-body">
				<div class="container">
					<!-- <keep-alive include="home"> -->
						<router-view></router-view>
					<!-- </keep-alive> -->
				</div>
			</div>
		</div>

		<footer class="footer has-background-dark">
			<div class="content has-text-centered">
				<p>
				<strong class="has-text-light">Generally useless app utilizing the Spotify WEB API</strong> by <a href="https://github.com/scyhhe" target="_blank">Ivan Toporkov</a>. The source code is licensed
				<a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
				is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
				</p>
			</div>
		</footer>

	</div>
</template>
<script>
	import Nav from './components/Nav.vue'
	import Loading from 'vue-loading-overlay';
	import { mapGetters } from 'vuex'

	export default {
		components: {
			appNav: Nav,
			Loading
		},
		computed: {
			...mapGetters([
				'isLoggedIn',
				'isLoading'
			]),
		},
		created() {
			//TODO: Check if user exists and log him in on new page openings
			console.log('APP component created')
		}
	};
</script>
<style>
	hr {
		opacity: 0.7;
	}

	#fullheight {
		min-height: 100vh;
	}

	#fullheight > .wrapper {
		/* margin-top: 50px; */
		background-image: url('../../../public/images/concert_crowd_full.jpg');
		min-height: 50vh;
		background-repeat: round;
	}

	.max-height {
		height: 100vh;
	}

	/* if u want the footer at the bottom */
	/* footer {
		position: absolute;
		height: 10vh;
		bottom: 0;
		width: 100%;
	} */

	/* enable for blur effect */
	/* .is-loading {
		-webkit-filter: blur(5px);
  		-moz-filter: blur(5px);
  		-o-filter: blur(5px);
  		-ms-filter: blur(5px);
  		filter: blur(5px);
	} */
	/*****************/
	::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
	}
	/* optional: show position indicator in red */
	::-webkit-scrollbar-thumb {
	    background: #FF0000;
	}

</style>