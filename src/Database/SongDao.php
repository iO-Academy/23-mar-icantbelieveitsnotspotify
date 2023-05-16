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
        $sql = 'SELECT `id`, `song_name`, `length`, `song_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $songId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $song = $query->fetch();

        return new Song($song['id'], $song['song_name'], $song['length'], $song['song_count'], $song['album_id']);
    }

    public function fetchAllSongsFromAlbumId(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `song_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        $arr = [];

        foreach ($songs as $song)
        {
            $arr[] = new Song($song['id'], $song['song_name'], $song['length'], $song['song_count'], $song['album_id']);
        }

        return $arr;
    }

    public function fetchSongFromNameAndArtist(string $name , string $artist): Song
    {
        $sql = 'SELECT `songs`.`id`, `song_name`, `length`, `song_count`, `album_id` '
            . 'FROM `songs`'
            . 'INNER JOIN `albums`'
            . 'ON `songs`.`album_id` = `albums`.`id` '
            . 'INNER JOIN `artists` '
            . 'ON `albums`.`artist_id` = `artists`.`id` '
            . 'WHERE `song_name` = :name AND `artist_name` = :artist; ';

        $value = [':name' => $name, ':artist' => $artist];

        $query = $this->db->getPdo()->prepare($sql);

        $query->execute($value);
        $song = $query->fetch();

        if (!$song) {
            throw new \Exception('Unknown song');
        }

        return new Song($song['id'], $song['song_name'], $song['length'], $song['song_count'], $song['album_id']);
    }
}