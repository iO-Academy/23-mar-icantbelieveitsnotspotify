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

    public function fetchSongFromNameAndArtist(string $name , string $artist): Song
    {
        $sql = 'SELECT `songs`.`id`, `song_name`, `length`, `play_count`, `album_id` '
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

        return new Song($song['id'], $song['song_name'], $song['length'], $song['play_count'], $song['album_id']);
    }

    public function incrementSongPlayedCount(int $id): bool
    {
        $sql = 'UPDATE `songs` '
            .'SET `play_count` = `play_count` + 1 '
            .'WHERE `id` = :id;';
        $value = [':id' => $id];

        $stmt = $this->db->getPdo()->prepare($sql);

        $success = $stmt->execute($value);
        return $success;
    }

    public function incrementAlbumPlayedCount(int $id): bool
    {
        $sql = 'UPDATE `albums` '
            .'SET `album_play_count` = `album_play_count` + 1 '
            .'WHERE `id` = :id;';
        $value = [':id' => $id];

        $stmt = $this->db->getPdo()->prepare($sql);

        $success = $stmt->execute($value);
        return $success;
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

    public function addLastPlayedTimestamp(int $id, string $timestamp): bool
    {
        $sql = 'UPDATE `songs` '
            .'SET `last_play_timestamp` = :timestamp '
            .'WHERE `id` = :id;';
        $value = [':id' => $id, ':timestamp' => $timestamp];

        $query = $this->db->getPdo()->prepare($sql);

        $success = $query->execute($value);
        return $success;
    }

    public function getRecentPlayedSongArray(): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id`, `last_play_timestamp` '
            . 'FROM `songs` '
            . 'WHERE `last_play_timestamp` IS NOT NULL '
            . 'ORDER BY `last_play_timestamp` DESC '
            . 'LIMIT 5 ;';

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute();
        $recentSongs = $query->fetchAll();

        return $recentSongs;
    }
}
