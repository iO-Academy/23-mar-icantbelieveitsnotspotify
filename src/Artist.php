<?php

namespace Musicplayer;



class Artist
{
    private int $artistId;
    private string $artistName;
//    private array $albums;

    public function __construct($artistId, $artistName)
    {
        $this->artistId = $artistId;
        $this->artistName = $artistName;
//        $this->albums = $albums;
    }

    /**
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

//    /**
//     * @return array
//     */
//    public function getAlbums(): array
//    {
//        return $this->albums;
//    }


}