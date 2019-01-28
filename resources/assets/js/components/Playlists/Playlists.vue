<template>
<div class="columns">
  <div class="column is-one-third has-background-dark">
    <aside class="menu">
      <p class="menu-label">
        General
      </p>
      <ul class="menu-list">
        <li><a>Featured</a></li>
        <li><a>Browse</a></li>
      </ul>
      <p class="menu-label">
        Your playlists <i class="has-text-success">({{ playlists.total }})</i>
      </p>
      <ul class="menu-list">
        <li v-for="(value) in playlists.items" :key="value.id">
          <router-link :to="{ name: 'playlist', params: { id: value.id } }" :class="{ 'is-active-custom': isActive === value.id }" style="width: 50vw;">
            {{ value.name }}
          </router-link>
          <span class="has-text-success">{{ value.tracks.total }}</span>
        </li>
      </ul>
    </aside>
  </div>
  <!--  end 1/3 column -->
  <div v-if="this.$route.params.id" class="column has-background-dark" id="show-playlist">
    <!-- playlist info goes here -->
    <keep-alive>
      <app-playlist></app-playlist>
    </keep-alive>
  </div>
</div>
</template>

<script>
import Playlist from "./Playlist.vue";
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  name: "Playlists",
  components: {
    'appPlaylist': Playlist
  },
  data() {
    return {
      playlists: {}
    };
  },
  mounted() {
    this.assignPlaylists()
  },
  computed: {
    isActive() {
      console.log(this.$route.params.id)
      return this.$route.params.id
    }
  },
  methods: {
    assignPlaylists() {
      const { playlists } = this.$store.getters.getProfile
      this.playlists = Object.assign({}, playlists);
    },
  },
};
</script>

<style lang="css" scoped>
#show-playlist {
  margin-left: 25px;
}

p.menu-label {
  font-size: 1.2em;
}

.is-active-custom {
  background-color: #3AD168;
  color: #fff;
}

li {
  font-size: 1em;
  display: flex;
  justify-content: space-between;
}

li a {
  color: rgba(255,255,255,0.6);
}

li span {
  padding: 0.5em 0.75em;
}
</style>
