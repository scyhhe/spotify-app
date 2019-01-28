<template>
<div>
	<h1 class="title is-1">Your profile</h1>
	<div class="tile is-ancestor">
	
	  	<div class="tile is-vertical is-8">
		    <div class="tile">
		      <div class="tile is-parent is-vertical">
		        <!-- <app-followers :followers="data.user.followers.total"></app-followers> -->
		        <app-following :following="data.following"></app-following>
		      </div>
		      <app-user-info :userinfo="data.info"></app-user-info>
		    </div>
		    <div class="tile is-parent">
		      <app-top-artists :artists="data.top_artists.items"></app-top-artists>
		    </div>
	  </div>
	  <app-recent-tracks :tracks="data.recent_tracks"></app-recent-tracks>
	</div>
	<!-- <app-modal name="example"></app-modal> -->
</div>

	
</template>

<script>
	import UserInfo from './UserInfo.vue'
	import RecentTracks from './RecentTracks.vue'
	import Followers from './Followers.vue'
	import FollowingArtists from './FollowingArtists.vue'
	import TopArtists from './TopArtists.vue'

	export default {
		props: ['data'],
		components: {
			appUserInfo: UserInfo,
			appRecentTracks: RecentTracks,
			appFollowers: Followers,
			appFollowing: FollowingArtists,
			appTopArtists: TopArtists,
		},
	};
</script>
<style scoped>
	h1.title {
		text-shadow: 0.5px 1px 10px black;
	}
</style>