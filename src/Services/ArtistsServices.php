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
            $artistName = $thisArtist->getArtistName();

//            echo $artistName;
            $albumDao = new AlbumDao();
            $albums = $albumDao->fetchAllAlbumsFromArtistId($thisArtist->getArtistId());
            foreach ($albums as $album)
            {
                $thisAlbum = new Album($album->getAlbumId(),
                                       $album->getAlbumName(),
                                       $album->getArtworkUrl(),
                                       $album->getArtistId());
                $songDao = new SongDao();
                $songs = $songDao->fetchAllSongsFromAlbumIdReturnArrayOfStrings($thisAlbum->getAlbumId());
//                $artistNameOutput[] = $artistName;
                $albumsOutput[] = ['Album'=>$thisAlbum->getAlbumName(), 'Songs'=>$songs, 'Artwork' => $thisAlbum->getArtworkUrl()];
            }
                $artistsOutput[] = ['Name'=>$thisArtist->getArtistName(), "Albums"=>$albumsOutput];
//                $output = [$thisArtist->getArtistName(), $albumsOutput];
        }
        return $artistsOutput;
    }

}