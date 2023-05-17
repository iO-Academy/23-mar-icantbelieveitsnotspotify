<?php

namespace Musicplayer\Services;
use Musicplayer\Entities\Artist;
use Musicplayer\Entities\Album;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\SongDao;

class ArtistServices
{
    public function convertArrayOfArraysToArrayOfArtists(array $rows): array
    {
        $artists = [];
        foreach ($rows as $row) {
            $artist = new Artist($row['id'], $row['artist_name']);
            $artists[] = $artist;
        }
        return $artists;
    }

    public function formatArtistJSONResponse($artistName): array
    {
        $artistDao = new ArtistDao();
        $albumDao = new AlbumDao();
        $albumServices = new AlbumServices();
        $songDao = new SongDao();
        $songServices = new SongServices();

        // Get artist Id from 'name' (error response to think about in future)
        $artistId = $artistDao->fetchArtistIdFromArtistName($artistName);



        $albumArray = $albumDao->fetchAllAlbumsFromArtistId($artistId['id']);
        $albums = $albumServices->convertArrayOfArraysToArrayOfAlbums($albumArray);

        foreach ($albums as $album) {
            $songArray = $songDao->fetchAllSongsFromAlbumId($album->getAlbumId());
            $songs = $songServices->convertArrayOfArraysToArrayOfSongs($songArray);
            foreach ($songs as $song) {
                $songsOutput[] = ['name' => $song->getSongName(), 'length' => $song->getLength(), 'play_count' => $song->getPlayCount()];
            }
            $albumsOutput[] = ['name' => $album->getAlbumName(), 'songs' => $songsOutput, 'artwork_url' => $album->getArtworkUrl()];
            $songsOutput = [];

        }
        return ['name'=>$artistName, "albums"=>$albumsOutput];
    }


}
