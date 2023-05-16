<?php

namespace Musicplayer\Entities;

class Album
{
    private int $albumId;
    private string $albumName;
    private string $artworkUrl;
    private string $artistId;

    public function __construct($albumId, $albumName, $artworkUrl, $artistId)
    {
        $this->albumId = $albumId;
        $this->albumName = $albumName;
        $this->artworkUrl = $artworkUrl;
        $this->artistId = $artistId;
    }

    /**
     * @return int
     */
    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    /**
     * @return string
     */
    public function getAlbumName(): string
    {
        return $this->albumName;
    }

    /**
     * @return string
     */
    public function getArtworkUrl(): string
    {
        return $this->artworkUrl;
    }

    /**
     * @return string
     */
    public function getArtistId(): string
    {
        return $this->artistId;
    }


}