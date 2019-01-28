<template>
	<div class="wrapper">
				 <div>
				    <figure class="image is-128x128">
				      <img :src="getTrackImage" alt="https://bulma.io/images/placeholders/1280x960.png" class="is-rounded">
				    </figure>
				 </div>
		  		<div>
				    <div class="content has-text-centered">
					    <p class="title is-size-5 is-spaced">{{ artist.name }}</p>
					    <p class="subtitle is-size-6"> {{ formatFollowers }} Followers</p>
				    </div>
				</div>

	</div>
</template>

<script>
export default {

  name: 'Artist',
  props: ['artist'],
  computed: {
   	getTrackImage() {
		let imageArray = this.artist.images
		if (imageArray.length === 1) {
			return imageArray[0].url
		}
		let random = Math.floor(Math.random() * imageArray.length)
		return imageArray[random].url
	},
	formatFollowers() {
		let numberToFormat = this.artist.followers.total
		return new Intl.NumberFormat('en-US').format(numberToFormat)
	}
  },
};
</script>

<style lang="css" scoped>
	div.wrapper {
		min-width: 200px;
		height: auto;
	}
	.content p {
		margin: 10px auto
	}
	img {
		width: 128px;
		height: 128px;
	}
</style>
