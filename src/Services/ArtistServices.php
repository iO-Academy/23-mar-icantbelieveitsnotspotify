<?php

namespace Musicplayer\Services;

use Musicplayer\Entities\Artist;
use Musicplayer\Entities\Album;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\SongDao;

class ArtistServices
{
    public function formatArtistJSONResponse($artistName): array
    {

        $artistDao = new ArtistDao();
        $albumDao = new AlbumDao();
        $songDao = new SongDao();

        // Get artist Id from 'name' (error response to think about in future)
        $artistId = $artistDao->fetchArtistIdFromArtistName($artistName);



        $albums = $albumDao->fetchAllAlbumsFromArtistId($artistId['id']);
        foreach ($albums as $album) {
            $songs = $songDao->fetchAllSongsFromAlbumId($album->getAlbumId());
            foreach ($songs as $song) {
                $songsOutput[] = ['name' => $song->getSongName(), 'length' => $song->getLength()];
            }
            $albumsOutput[] = ['name' => $album->getAlbumName(), 'songs' => $songsOutput, 'artwork_url' => $album->getArtworkUrl()];
        }
        $artistInfoArray[] = ['name'=>$artistName, "albums"=>$albumsOutput];
        return $artistInfoArray;
    }
}
