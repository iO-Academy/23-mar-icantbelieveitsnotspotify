<?php

namespace Musicplayer\test;
use Musicplayer\Artist;

class ArtistsDAO
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fetchAll(): array
    {
        $sql = 'SELECT `artists`.`artist_name` as `Artist`, 
                        `albums`.`album_name` as `Album Name`, 
                        `albums`.`artwork_url` as `Artwork URL`, 
                        `songs`.`song_name` as `Song Name`, 
                        `songs`.`length` as `Song Length`
                    FROM `artists`
                    INNER JOIN `albums` 
		            ON `artists`.`id` = `albums`.`artist_id`
                    INNER JOIN `songs`
		            ON `albums`.`id` = `songs`.`album_id`';
        $query = $this->db->getPdo()->prepare($sql);
        $query->execute();
        $rows = $query->fetchAll();


        $artists = [];
        foreach ($rows as $row) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
        exit;
            $artist = new Artists(
                $row['Artist'],
                $row['Album Name'],
                $row['Song Name'],
                $row['Artwork URL'],
                $row['Song Length']
            );
            $artists[] = $artist;
        }
        return $artists;
    }
}
