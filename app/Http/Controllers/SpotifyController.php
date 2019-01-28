<?php

namespace App\Http\Controllers;

use App\Token;
use Illuminate\Http\Request;
use SpotifyWebAPI\SpotifyWebAPI;
use Laravel\Socialite\Facades\Socialite;

//TODO: Add doc block comments & move try/catch block in separate method
//TODO: oh.. and add sqlite

class SpotifyController extends Controller
{
    protected $spotify;
    //holds the spotifywebapi object  and the session object
    // can use direct methods to make the api calls from this object

    public function __construct(SpotifyWebAPI $spotify)
    {
        $this->spotify = $spotify;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function redirectToProvider()
    {
        return Socialite::driver('spotify')->redirect();
    }

    public function handleProviderCallback()
    {        
        $user = Socialite::driver('spotify')->user();
        $access_token = $user->token;
        $refresh_token = $user->refreshToken;
        return redirect()->to('/')
            ->cookie(cookie('access_token', $access_token, now()->addWeek()->timestamp))
            ->cookie(cookie('refresh_token', $refresh_token, now()->addWeek()->timestamp));
    }

    public function fetchProfile(Request $request)
    {   
        try {
            $access_token = $request->cookies->get('access_token');
            $refresh_token = $request->cookies->get('refresh_token');

            if (empty($this->spotify->session->getAccessToken())) {
                $this->refreshAccessToken($refresh_token);
            }
        } catch (SpotifyWebAPI\SpotifyWebAPIAuthException $e) {
            return response()->json($e->getMessage());
        }
        
        $profile = [
            'tokens' => [
                'access_token' => $access_token,
                'refresh_token' => $refresh_token
            ],
            'user' => [
                'info' => $this->spotify->me(),
                // 'playback' => $this->spotify->getMyCurrentPlaybackInfo(),
                'following' => $this->spotify->getUserFollowedArtists(),
                'playlists' => $this->spotify->getMyPlaylists(),
                'recent_tracks' => $this->spotify->getMyRecentTracks(),
                'top_artists' => $this->spotify->getMyTop('artists'),
                // 'saved_tracks' => $this->spotify->getMySavedTracks(),
                // 'saved_albums' => $this->spotify->getMySavedAlbums(),
            ]
        ];

        return response()->json($profile);
    }

    public function fetchSearchResults(Request $request, $query)
    {
        //TODO: query spotify and return response to front end
    }

    public function fetchPlaylistById(Request $request, $id)
    {
        try {

            $access_token = $request->cookies->get('access_token');
            $refresh_token = $request->cookies->get('refresh_token');
            
            if (empty($this->spotify->session->getAccessToken())) {
                $this->refreshAccessToken($refresh_token);
            }   
        } catch (SpotifyWebAPI \SpotifyWebAPIAuthException $e) {
            return response()->json($e->getMessage());
        }

        $playlist = $this->spotify->getPlaylist($id, [
            'fields' => 'name,owner,description,followers(total),images(url),tracks.items(added_at,track(name,href,duration_ms,album(name,artists)))'
        ]);

        return response()->json($playlist);
    }

    protected function checkToken($request)
    {
        // TODO: move token check logic here
    }

    protected function refreshAccessToken($refreshToken)
    {
        $this->spotify->session->refreshAccessToken($refreshToken);
        $access_token = $this->spotify->session->getAccessToken();

        $this->spotify->setAccessToken($access_token);
    }
}
