<?php

namespace Musicplayer\Database;

use Musicplayer\Entities\Artist;

class ArtistDao
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createArtistFromArtistId(int $artistId): Artist
    {
        $sql = 'SELECT `id`, `artist_name` '
            . 'FROM `artists`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $artistId];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $artist = $query->fetch();

        return new Artist($artist['id'], $artist['artist_name']);
    }

    public function fetchArtistIdFromArtistName(string $artistName)
    {
        $sql = 'SELECT `id` '
            . 'FROM `artists`'
            . 'WHERE `artist_name` = :id; ';

        $value = [':id' => $artistName];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        return $query->fetch();

    }
}