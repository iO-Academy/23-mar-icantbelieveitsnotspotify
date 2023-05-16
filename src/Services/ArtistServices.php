<?php

namespace Musicplayer\Services;
use Musicplayer\Entities\Artist;

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
}
