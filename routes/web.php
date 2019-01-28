<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Socialite Routes
 */
Route::group([ 'middleware' => ['web'] ], function() {
    Route::get('/auth', 'SpotifyController@redirectToProvider');
    Route::get('/handle', 'SpotifyController@handleProviderCallback');
});

/* LARAVEL ROUTES */
Route::get('/profile', 'SpotifyController@fetchProfile');
// Route::get('/playlists', 'SpotifyController@fetchPlaylists'); # FETCHED WITH PROFILE
Route::get('/playlist/{id}', 'SpotifyController@fetchPlaylistById');
Route::get('/search', 'SpotifyController@fetchSearchResults');

/* LETTING VUE HANDLE THE SPA ROUTING */

Route::view('/{any}', 'master')->where('any', '.*');





