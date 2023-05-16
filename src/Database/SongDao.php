<?php

namespace Musicplayer\Database;

use Musicplayer\Entities\Album;
use Musicplayer\Entities\Song;

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
        $sql = 'SELECT `id`, `song_name`, `length`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        $arr = [];

        foreach ($songs as $song)
        {
            $arr[] = new Song($song['id'], $song['song_name'], $song['length'], $song['album_id']);
        }

        return $arr;
    }
    public function fetchAllSongsFromAlbumIdReturnArrayOfStrings(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `song_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        $arr = [];

        foreach ($songs as $song)
        {
            $arr[] = $song['song_name'];
        }

        return $arr;
    }

}