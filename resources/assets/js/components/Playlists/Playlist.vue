<template>
    <div class="wrapper">
        <nav class="level columns">
            <div class="level-left column is-8">
                <div class="level-item">
                    <img :src="this.getPlaylist.images[0].url" alt="Playlist Image" class="image is-128x128 is-pulled-left">
                </div>
                <div class="level-item" id="description">
                    <h1 class="title is-4 is-uppercase">{{ this.getPlaylist.name }}</h1>
                    <p class="is-4">{{ this.getPlaylist.description }}</p>
                </div>
            </div>
            <!-- end left -->
            <div class="level-right column">
                
                <p class="level-item is-4">By&nbsp;
                    <a :href="this.getPlaylist.owner.external_urls.spotify" class="has-text-success" target="_blank">
                        {{ this.getPlaylist.owner.display_name }}
                    </a>
                </p>
                <br>
                <p class="level-item"><span class="has-text-success">{{ this.getPlaylist.followers.total }}</span>&nbsp;Followers</p>
            </div>
            <!-- end right -->
        </nav>
        <hr style="opacity: 0.3; margin: 0;">
        <table class="table is-hoverable is-fullwidth has-background-dark has-text-light">
            <tr>
                <th id="title">TITLE</th>
                <th id="artist">ARTIST</th>
                <th id="album">ALBUM</th>
                <th id="added"><i class="far fa-calendar-alt"></i></th>
            </tr>
            <tr v-for="(value,key) in this.getPlaylist.tracks.items" :key="key">
                <td>{{ value.track.name }}</td>
                <td>{{ value.track.album.artists[0].name }}</td>
                <td>{{ value.track.album.name }}</td>
                <td>{{ value.added_at.substring(0, value.added_at.indexOf('T')) }}</td>
            </tr>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            playlist: {}
        }
    },
    mounted() {
        this.openPlaylist(this.id)
    },
    watch: {
        $route (to, from) {
            this.openPlaylist(to.params.id)
        }
    },
    computed: {
        getPlaylist() {
            return this.playlist
        }
    },
    methods: {
        openPlaylist(id) {
            this.$store.commit('toggleLoading')
            axios.get(`/playlist/${id}`, {
                id: id
            }).then(response => {
                this.playlist = Object.assign({}, this.playlist, response.data)
                this.$store.commit('toggleLoading')
                })
                .catch(error => {
                    console.log(error)
                    this.$store.commit('toggleLoading')
                })
        }
    }
};
</script>
<style scoped>
    .wrapper {
        max-height: 75vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .level-left {
        display: flex;
    }

    #description {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 70%;
    }

    #added {
        width: 10vw;
    }

    #title, #album, #artist {
        width: 20vw;
    }

    div.column {
        max-height: 60vh;
    }

    table th {
        color: rgba(255,255,255,0.9);
    }

    table td {
        color: rgba(255,255,255,0.6);
        font-size: 0.7em;
    }
</style>

