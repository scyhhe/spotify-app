<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SpotifyWebAPI;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SpotifyWebAPI\SpotifyWebAPI', function ($app = null)
        {
            $client = new SpotifyWebAPI\SpotifyWebAPI;

            $session = new SpotifyWebAPI\Session(
                config('services.spotify.client_id'),
                config('services.spotify.client_secret'),
                config('services.spotify.redirect')
            );
            
            $options = [
                'scope' => [
                    'playlist-read-private',
                    'playlist-read-collaborative',
                    'playlist-modify-private',
                    'playlist-modify-public',
                    'user-read-email',
                    'user-read-playback-state',
                    'user-library-read',
                    'user-top-read',
                    'user-read-recently-played',
                    'user-follow-read'
                ]
            ];
            
            
            $accessToken = $session->getAccessToken();
            $refreshToken = $session->getRefreshToken();

            $client->setAccessToken($accessToken);
            $client->session = $session;
            $client->scopes = $options;
            
            return $client;
        });
    }
}
