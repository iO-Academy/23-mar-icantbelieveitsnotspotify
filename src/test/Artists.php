<?php

namespace Musicplayer\test;

class Artists
{
    private string $artistName;
    private string $albumName;
    private string $artworkURL;
    private string $songName;
    private float $songLength;

    public function __construct(
        string $artistName,
        string $albumName,
        string $artworkURL,
        string $songName,
        float $songLength
    ) {
        $this->artistName = $artistName;
        $this->albumName = $albumName;
        $this->artworkURL = $artworkURL;
        $this->songName = $songName;
        $this->songLength = $songLength;
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
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
    public function getArtworkURL(): string
    {
        return $this->artworkURL;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @return float
     */
    public function getSongLength(): float
    {
        return $this->songLength;
    }
}
