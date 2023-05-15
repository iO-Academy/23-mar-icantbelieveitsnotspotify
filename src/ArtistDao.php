<?php

namespace Musicplayer;

use Musicplayer\Artist;

class ArtistDao
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function createArtistFromId(int $artistId)
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
}