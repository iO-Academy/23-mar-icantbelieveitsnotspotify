<?php

namespace Musicplayer\Entities;
use Musicplayer\Database\ArtistDao;


class Artist
{
    private int $artistId;
    private string $artistName;

    public function __construct($artistId, $artistName)
    {
        $this->artistId = $artistId;
        $this->artistName = $artistName;
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

}