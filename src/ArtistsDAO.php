<?php

namespace Musicplayer;
require "vendor/autoload.php";

class ArtistsDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('musicplayer');
    }

    public function fetchAll(): array
    {
        $sql = 'SELECT `artists`.`artist_name` as `Artist`, `albums`.`album_name` as `Album Name`, `albums`.`artwork_url` as `Artwork URL`, `songs`.`song_name` as `Song Name`, `songs`.`length` as `Song Length`
                    FROM `artists`
                    INNER JOIN `albums` 
		            ON `artists`.`id` = `albums`.`artist_id`
                    INNER JOIN `songs`
		            ON `albums`.`id` = `songs`.`album_id`';
        $query = $this->db->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll();

        $artists = [];
        foreach ($rows as $row) {
            $artist = new Artist(
                $row['Artist'],
                $row['Album Name'],
                $row['Song Name'],
                $row['Artwork URL']
            );
            $artists[] = $artist;
        }
        return $artists;
    }
}
