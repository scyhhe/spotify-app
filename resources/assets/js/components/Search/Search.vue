<template>
  <div class="wrapper columns">
    <!-- col 1 start -->
    <div class="control column is-three-quarters">
      <input class="input is-medium is-rounded" type="text" placeholder="What are you looking for?">
      <!-- <span class="icon is-small is-left">
        <i class="fas fa-music"></i>
      </span> -->
    </div>
    <!-- col end -->
    <!-- col 2 start -->
    <div class="column">
      <a class="button is-success is-medium is-outlined">
        <span class="icon is-medium">
          <i class="fas fa-search"></i>
        </span>
        <span>Search</span>
      </a>
    </div>

  </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";

export default {
  computed: {
    ...mapGetters(["isLoggedIn", "getAccessTokenFromLocalStorage", "getRefreshTokenFromLocalStorage"])
  },
  methods: {
	  ...mapMutations(['logUserIn'])
  },
};
</script>