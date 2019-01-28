# A Spotify SPA App that does stuff

## Still a WIP, loads of stuff left to do :octocat:

This generally useless app lets you login with your **Spotify account** and see basic information about your profile, such as:

   * Profile info & followers :star:

   * Your most recent tracks :musical_note:

   * Your favorite artists :hear_no_evil:

   * Your playlists :notes:

   * *soon* Search songs & artists on spotify and follow / add them :mag:

## Installation

**!** To get this working locally you will still need a Spotify *Client ID* and *Secret*, which you can get by registering your app in
the [Spotify Developer Portal](https://developer.spotify.com/) :seedling:

1. Clone or download this repo

    `git clone https://github.com/scyhhe/spotify-app.git`

1. Install **Composer** and **Node** dependencies

    `composer install`

    `npm install`

1. Rename `.env.example` to `.env`

    `cp .env.example .env`

1. Replace Spotify values with the ones you got when registering your app in `.env` file

    ```bash
    SPOTIFY_CLIENT_ID="YOUR_SPOTIFY_CLIENT_ID"
    SPOTIFY_CLIENT_SECRET="YOUR_SPOTIFY_CLIENT_SECRET"
    SPOTIFY_REDIRECT_URI="YOUR_SPOTIFY_REDIRECT_URI"
    ```

1. Compile JS

    `npm run dev` 
    
    or

    `npm run watch`


1. Run in a virtual host, can't seem to get *webpack-dev-server* to serve, its on the TODO:// list :smile:




