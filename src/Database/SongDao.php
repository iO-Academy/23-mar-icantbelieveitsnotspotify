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
        $sql = 'SELECT `id`, `song_name`, `length`, `song_count`, `album_id` '
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
        $sql = 'SELECT `id`, `song_name`, `length`, `song_count`, `album_id` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        return $songs;
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

    public function incrementSongPlayedCount(int $id): bool
    {
        $sql = 'UPDATE `songs` '
            .'SET `song_count` = `song_count` + 1 '
            .'WHERE `id` = :id;';
        $value = [':id' => $id];

        $stmt = $this->db->getPdo()->prepare($sql);

        $success = $stmt->execute($value);
        return $success;
    }

    public function addLastPlayedTimestamp(int $id, string $timestamp): bool
    {
        $sql = 'UPDATE `songs` '
            .'SET `last_play_timestamp` = :timestamp '
            .'WHERE `id` = :id;';
        $value = [':id' => $id, ':timestamp' => $timestamp];

        $stmt = $this->db->getPdo()->prepare($sql);

        $success = $stmt->execute($value);
        return $success;
    }
}

