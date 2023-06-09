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
        $sql = 'SELECT `id`, `song_name`, `length`, `album_id`, `play_count`, `is_fav` '
            . 'FROM `songs`'
            . 'WHERE `album_id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $songs = $query->fetchAll();
        return $songs;
    }

    public function fetchSongFromNameAndArtist(string $name, string $artist): Song
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
            . 'SET `play_count` = `play_count` + 1 '
            . 'WHERE `id` = :id;';
        $value = [':id' => $id];

        $query = $this->db->getPdo()->prepare($sql);

        $success = $query->execute($value);
        return $success;
    }

    public function incrementAlbumPlayedCount(int $id): bool
    {
        $sql = 'UPDATE `albums` '
            . 'SET `album_play_count` = `album_play_count` + 1 '
            . 'WHERE `id` = :id;';
        $value = [':id' => $id];

        $query = $this->db->getPdo()->prepare($sql);

        $success = $query->execute($value);
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
            . 'SET `last_play_timestamp` = :timestamp '
            . 'WHERE `id` = :id;';
        $value = [':id' => $id, ':timestamp' => $timestamp];

        $query = $this->db->getPdo()->prepare($sql);

        $success = $query->execute($value);
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

        $query = $this->db->getPdo()->prepare($sql);

        $successAddedFav = $query->execute($value);
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

    public function getSearchResults(string $search): array
    {
        $sql = 'SELECT `songs`.`song_name` as `name`, `artists`.`artist_name` as `artist`, `songs`.`length`, `albums`.`artwork_url`, `songs`.`play_count`, `songs`.`is_fav` '
                . 'FROM `songs` '
                . 'INNER JOIN `albums` ON `songs`.`album_id` = `albums`.`id` '
                . 'INNER JOIN `artists` ON `albums`.`artist_id` = `artists`.`id` '
                . 'WHERE LOWER(`songs`.`song_name`) LIKE LOWER (:search) '
                . 'LIMIT 10; ';

        $value = [':search' => '%' . $search . '%'];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $searchResults = $query->fetchAll();

        return $searchResults;
    }
}
