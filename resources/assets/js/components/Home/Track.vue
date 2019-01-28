<template>
	<div class="box">
	  	<article class="media">
	    <div class="media-left">
	      <figure class="image is-96x96">
	        <img :src="getTrackImage" alt="https://bulma.io/images/placeholders/128x128.png">
	      </figure>
	    </div>
	    <div class="media-content">
	      <div class="content">
	        <p>
	          <strong>{{ track.track.name }}</strong>
	          <br>
	          <strong class="artist"> {{ concatArtists }}</strong>
	          <br>
	          <small>Played</small> 
	          <small>{{ formatTime(track.played_at) }}</small>
	          <br>
	          <span class="tag is-black" v-if="track.track.explicit">EXPLICIT</span>
	          
	        </p>
	      </div>
	    </div>
	  </article>
	</div>
</template>
<script>
	export default {
		props: ['track'],
		computed: {
			getTrackImage() {
				let imageArray = this.track.track.album.images
				if (imageArray.length === 1) {
					return imageArray[0].url
				}
				let random = Math.floor(Math.random() * imageArray.length)
				return imageArray[random].url
			},
			concatArtists() {
				let artistArray = this.track.track.artists
				if (artistArray.length === 1) {
					return artistArray[0].name
				}
				let artists = ''
				artistArray.forEach((element, index, array) => {
					if (index ===  array.length - 1) {
						artists += element.name
					} else {
						artists += element.name + ' & '	
					}
				})

				return artists
			}
		},
		methods: {
			formatTime(string) {
				let date = string.toString()
				return Moment(date, 'YYYY-MM-DD kk:mm Z').fromNow()
			},
		}
	};
</script>
<style scoped>
	div.box {
		background: transparent;
		border-radius: 0;
		border-bottom: 1px solid rgba(57,57,57,0.7);
		margin-bottom: 0;
		padding: 20px 10px;
		min-height: 115px;
		color: #fff;
	}
	div.box:first-child {
		border-top: 1px solid rgba(57,57,57,0.7);
	}
	div.box:last-child {
		border: none;
	}

	div.media-left {
		margin-top: auto;
		margin-bottom: auto;
	}

	span.tag {
		margin-top: .5em;
	}

	strong.artist {
		font-size: 14px;
	}

	@media (max-width : 991px) and (min-width: 768px) {
		div.media-left {
			margin-top: 0;
			margin-bottom: 0;
		}
		div.content {
			min-width: 125px;

		}
		small, .tag {
			font-size: 0.5em;
		}
		strong {
			font-size: 0.7em;
		}
	}
</style>