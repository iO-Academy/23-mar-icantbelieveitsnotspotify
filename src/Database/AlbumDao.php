<?php

namespace Musicplayer\Database;
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
        $sql = 'SELECT `albums`.`id`,`albums`.`artist_id`,`artists`.`artist_name`, `albums`.`album_name`, `albums`.`artwork_url` '
            . 'FROM `albums` '
            . 'INNER JOIN `artists` '
            . 'ON `albums`.`artist_id` = `artists`.`id` '
            . 'WHERE `album_play_count` > 0 '
            . 'ORDER BY `album_play_count` DESC '
            . 'LIMIT 5';

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute();
        $albums = $query->fetchAll();

        return $albums;
    }
}
