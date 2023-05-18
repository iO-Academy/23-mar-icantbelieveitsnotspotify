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
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id`, `is_fav` '
            . 'FROM `songs`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $songId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $song = $query->fetch();

        return new Song($song['id'], $song['song_name'], $song['length'], $song['play_count'], $song['album_id'], $song['is_fav']);
    }

    public function fetchAllSongsFromAlbumId(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `album_id`, `play_count`, `is_fav` '
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
        $sql = 'SELECT `songs`.`id`, `song_name`, `length`, `album_id`, `play_count`, `is_fav` '
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

        return new Song($song['id'], $song['song_name'], $song['length'], $song['play_count'], $song['album_id'], $song['is_fav']);
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

    public function fetchAllSongsFromAlbumIdReturnArrayOfStrings(int $albumId): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id`, `is_fav` '
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

        $stmt = $this->db->getPdo()->prepare($sql);

        $success = $stmt->execute($value);
        return $success;
    }

    public function getRecentPlayedSongArray(): array
    {
        $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id`, `is_fav`, `last_play_timestamp` '
            . 'FROM `songs` '
            . 'WHERE `last_play_timestamp` IS NOT NULL '
            . 'ORDER BY `last_play_timestamp` DESC '
            . 'LIMIT 5 ;';

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute();
        $recentSongs = $query->fetchAll();

        return $recentSongs;
    }

        public function setIsFavSong(int $id, bool $isFav): bool
    {
        $sql = 'UPDATE `songs` '
            . 'SET `is_fav` = :isFav '
            . 'WHERE `id` = :id; ';

        $value = [':id' => $id, ':isFav' => (int)$isFav];

        $stmt = $this->db->getPdo()->prepare($sql);

        $successAddedFav = $stmt->execute($value);
        return $successAddedFav;
    }

    public function getFavSongsArray(): array
    {
            $sql = 'SELECT `id`, `song_name`, `length`, `play_count`, `album_id`, `is_fav`, `last_play_timestamp` '
                . 'FROM `songs` '
                . 'WHERE `is_fav` IS NOT NULL ';

            $query = $this->db->getPdo()->prepare($sql);
            $query->execute();
            $favouriteSongs = $query->fetchAll();

        return $favouriteSongs;
    }

}
