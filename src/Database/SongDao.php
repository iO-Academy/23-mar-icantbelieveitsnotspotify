<?php

namespace Musicplayer\Database;

use Musicplayer\Entities\Song;
use Musicplayer\Services\SongServices;

class SongDao
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fetchSongFromSongId(int $songId): Song
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $songId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $song = $query->fetch();

        return new Song($song['id'], $song['song_name'], $song['length'], $song['album_id']);
    }

    public function fetchAllSongsFromAlbumId(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        return $songs;
    }

    public function fetchAllSongsFromAlbumIdReturnArrayOfStrings(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();

        $songServices = new SongServices();
        $output = $songServices->convertArrayOfArraysToArrayOfSongStrings($songs);

        return $output;
    }
}
