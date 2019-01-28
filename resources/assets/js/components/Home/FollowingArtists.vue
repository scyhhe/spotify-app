<template>
	<article class="tile is-child notification is-success">
		<p class="title">Following</p>
		<p class="subtitle">You are following {{ following.artists.total }} artists</p>
	</article>
</template>
<script>
	export default {
		props: ['following']
	}
</script>