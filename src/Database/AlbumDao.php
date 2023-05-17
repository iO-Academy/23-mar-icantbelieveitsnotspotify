<?php

namespace Musicplayer\Database;
require 'vendor/autoload.php';
use Musicplayer\Entities\Album;

class AlbumDao
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fetchAlbumFromAlbumId(int $albumId): Album
    {
        $sql = 'SELECT `id`, `album_name`, `artwork_url`, `artist_id` '
            . 'FROM `albums`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $albumId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $album = $query->fetch();

        return new Album($album['id'], $album['album_name'], $album['artwork_url'], $album['artist_id']);
    }

    public function fetchAlbumFromArtistId(int $artistId): Album
    {
        $sql = 'SELECT `id`, `album_name`, `artwork_url`, `artist_id` '
            . 'FROM `albums`'
            . 'WHERE `artist_id` = :id; ';

        $value = [':id' => $artistId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $album = $query->fetch();

        return new Album($album['id'], $album['album_name'], $album['artwork_url'], $album['artist_id']);
    }

    public function fetchAllAlbumsFromArtistId(int $artistId): array
    {
        $sql = 'SELECT `id`, `album_name`, `artwork_url`, `artist_id` '
            . 'FROM `albums`'
            . 'WHERE `artist_id` = :id; ';

        $value = [':id' => $artistId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $albums = $query->fetchAll();

        return $albums;
    }

    public function fetchTopFiveAlbums(): array
    {
        $sql= 'SELECT `album_name`,`artist_id`,`album_play_count` '
           . 'FROM `albums` '
           . 'ORDER BY `album_play_count` DESC'
           . 'LIMIT 5';

        $query = $this->db->getPdo()->prepare($sql);
        $albums = $query->fetchAll();

        return $albums;
    }
}
