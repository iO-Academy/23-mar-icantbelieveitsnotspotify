<?php

namespace Musicplayer\Services;

use Musicplayer\Entities\Artist;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\SongDao;

class ArtistsServices
{
    public function formatArtistsJSONResponse(): array
    {
        $ArtistDao = new ArtistDao();
        $artists = $ArtistDao->fetchAllArtists();
        $artistServices = new ArtistServices();
        $artists = $artistServices->convertArrayOfArraysToArrayOfArtists($artists);
        $artistsOutput = [];
        foreach ($artists as $artist) {
            $albumData = $this->getAlbumData($artist);
            $artistsOutput[] = [
                'name' => $artist->getArtistName(),
                'albums' => $albumData
            ];
        }
        return ['artists' => $artistsOutput];
    }

    private function getAlbumData(Artist $artist): array
    {
        $albumDao = new AlbumDao();
        $albums = $albumDao->fetchAllAlbumsFromArtistId($artist->getArtistId());
        $albumServices = new AlbumServices();
        $albums = $albumServices->convertArrayOfArraysToArrayOfAlbums($albums);
        $albumData = [];
        foreach ($albums as $album) {
            $songDao = new SongDao();
            $songs = $songDao->fetchAllSongsFromAlbumIdReturnArrayOfStrings($album->getAlbumId());
            $albumData[] = [
                'name' => $album->getAlbumName(),
                'songs' => $songs,
                'artwork_url' => $album->getArtworkUrl()
            ];
        }
        return $albumData;
    }
}
