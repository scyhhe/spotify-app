<template>
	<article class="tile is-child notification is-primary">
		<p class="title">Followers</p>
		<p class="subtitle">You have {{ followers }} followers. You're a rockstar!</p>
	</article>
</template>
<script>
	export default {
		props: ['followers']
	};
</script>