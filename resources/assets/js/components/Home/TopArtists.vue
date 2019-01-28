<template>
	<article class="tile is-child notification is-dark">
		<p class="title">Top artists</p>
		<p class="subtitle">Who you listen to the most. Any surprises?</p>
		<!-- Content -->
		<div class="content">
			<!-- Card -->
			<app-artist v-for="(artist,index) in artists" :artist="artist" :key="index"></app-artist>
			<!-- end card -->
		</div>
		<!-- end content -->
	</article>
</template>
<script>
	import Artist from './Artist.vue'

	export default {
		props: ['artists'],
		components: {
			appArtist: Artist
		}
	};
</script>
<style scoped>
	article {
		overflow: hidden;
	}
	div.content {
		/*max-width*/
		overflow-x: scroll;
		display: flex;
		direction: row;
		height: auto;
	}
</style>