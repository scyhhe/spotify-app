<template>
	<div class="tile is-parent">
	    <article class="tile is-child notification is-dark">
	      <div class="content has-text-centered">
	        <p class="title">Recent tracks</p>
	        <p class="subtitle">The latest {{ tracks.limit }} tracks you played</p>
	        <div class="content">
	          <!-- Content -->
	          <app-track v-for="(track,key) in tracks.items" :track="track" :key="key"></app-track>
	        </div>
	      </div>
	    </article>
	  </div>
</template>
<script>
	import Track from './Track.vue'

	export default {
		props: ['tracks'],
		components: {
			appTrack: Track
		}
	};
</script>
<style scoped>
	div.content {
		max-height: 60vh;
		overflow-y: scroll;
	}

	article {
		padding: 20px 0 0 0;
	}
</style>