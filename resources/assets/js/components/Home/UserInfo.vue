<template>
	<div class="tile is-parent">
		        <article class="tile is-child notification is-info has-text-centered">
		          <p class="title">
		          	<a :href="userinfo.external_urls.spotify" target="_blank">
		          		{{ userinfo.display_name }}
		          	</a>
		      	  </p>
		          <p class="subtitle">{{ userinfo.email }}</p>
		          <figure class="image is-128x128">
		            <img :src="userinfo.images[0].url" alt="https://bulma.io/images/placeholders/640x480.png" class="is-rounded">
		          </figure>
		        </article>
	</div>
</template>
<script>
	export default {
		props: ['userinfo']
	};
</script>
<style scoped>
	.image {
		margin: 0 auto;
	}
	.notification a, p.subtitle {
		text-decoration: none;
	}
	.notification a:hover {
		text-decoration: underline;
	}

</style>