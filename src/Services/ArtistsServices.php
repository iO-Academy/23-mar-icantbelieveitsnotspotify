<?php

namespace Musicplayer\Services;

use Musicplayer\Entities\Artist;
use Musicplayer\Entities\Album;
use Musicplayer\Entities\ArtistDao;
use Musicplayer\Entities\AlbumDao;
use Musicplayer\Entities\SongDao;

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


        }
    }
}