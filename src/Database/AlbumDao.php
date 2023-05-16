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
        $arr = [];

        foreach ($albums as $album) {
            $arr[] = new Album($album['id'], $album['album_name'], $album['artwork_url'], $album['artist_id']);
        }
        return $arr;
    }
}
