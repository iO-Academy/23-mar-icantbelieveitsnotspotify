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
            $albumsOutput = [];
            foreach ($albums as $album) {
                $thisAlbum = new Album($album->getAlbumId(),
                    $album->getAlbumName(),
                    $album->getArtworkUrl(),
                    $album->getArtistId());
                $songDao = new SongDao();
                $songs = $songDao->fetchAllSongsFromAlbumIdReturnArrayOfStrings($thisAlbum->getAlbumId());
                $albumsOutput[] = ['name' => $thisAlbum->getAlbumName(), 'songs' => $songs, 'artwork_url' => $thisAlbum->getArtworkUrl()];
            }
            $artistsOutput[] = ['name' => $thisArtist->getArtistName(), "albums" => $albumsOutput];
        }
        $output = ["artists" => $artistsOutput];
        return $output;
    }
}