<?php

namespace Musicplayer\Services;

use Musicplayer\Entities\Artist;
use Musicplayer\Entities\Album;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\SongDao;

class ArtistsServices
{
    public function formatArtistsJSONResponse(): array
    {
        $artistsDao = new ArtistDao();
        $artists = $artistsDao->fetchAllArtists();
        foreach ($artists as $artist) {
            $thisArtist = new Artist($artist->getArtistId(), $artist->getArtistName());
            $albumDao = new AlbumDao();
            $albums = $albumDao->fetchAllAlbumsFromArtistId($thisArtist->getArtistId());
            foreach ($albums as $album)
            {
                $thisAlbum = new Album($album->getAlbumId(),
                                       $album->getAlbumName(),
                                       $album->getArtworkUrl(),
                                       $album->getArtistId());
                $songDao = new SongDao();
                $songs = $songDao->fetchAllSongsFromAlbumId($thisAlbum->getAlbumId());
                return $songs;
            }
            return $albums;
        }
        return $artists;
    }
}