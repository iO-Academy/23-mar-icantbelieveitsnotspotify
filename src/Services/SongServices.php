<?php

namespace Musicplayer\Services;
use Musicplayer\Entities\Song;

class SongServices
{
    public function convertArrayOfArraysToArrayOfSongs(array $rows): array
    {
        $songs = [];
        foreach ($rows as $row) {
            $song = new Song($row['id'], $row['song_name'], $row['length'], $row['song_count'], $row['album_id']);
            $songs[] = $song;
        }
        return $songs;
    }

    public function convertArrayOfArraysToArrayOfSongStrings(array $songs): array
    {
        $songStrings = [];
        foreach ($songs as $song) {
            $songStrings[] = $song['song_name'];
        }
        return $songStrings;
    }
}
