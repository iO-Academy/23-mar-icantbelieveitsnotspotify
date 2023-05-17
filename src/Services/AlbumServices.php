<?php

namespace Musicplayer\Services;
use Musicplayer\Entities\Album;

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
}
