<?php

namespace Musicplayer\Services;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Entities\Album;
use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\SongDao;
use Musicplayer\Entities\Artist;

class AlbumServices
{
    public function convertArrayOfArraysToArrayOfAlbums(array $rows): array
    {
        $albums = [];
        foreach ($rows as $row) {
            $album = new Album($row['id'], $row['album_name'], $row['artwork_url'], $row['artist_id']);
            $albums[] = $album;
        }
        return $albums;
    }

    public function formatPopularAlbumsJSONResponse(): array
    {
        $albumDao = new AlbumDao();
        $popularAlbums = $albumDao->fetchTopFiveAlbums();
        $albumServices = new AlbumServices();
        $popularAlbums = $albumServices->convertArrayOfArraysToArrayOfAlbums($popularAlbums);
        $popularAlbumsData = [];
        foreach ($popularAlbums as $album){
            $songDao = new SongDao();
            $artistDao = new ArtistDao();
            $songs = $songDao->fetchAllSongsFromAlbumIdReturnArrayOfStrings($album->getAlbumId());
            $artistId = $album->getArtistId();
            $artist = $artistDao->createArtistFromArtistId($artistId);
            $artistName = $artist->getArtistName();
            $popularAlbumsData[] = [
                'artist' => $artistName,
                'name' => $album->getAlbumName(),
                'songs' => $songs,
                'artwork_url' => $album->getArtworkUrl()
            ];
        }
        return $popularAlbumsData;
    }
}
