<?php

namespace Musicplayer\Entities;

class Song
{
    private int $songId;
    private string $songName;
    private float $length;
    private int $songCount;
    private int $albumId;

    public function __construct($songId, $songName, $length, $songCount, $albumId)
    {
        $this->songId = $songId;
        $this->songName = $songName;
        $this->length = $length;
        $this->songCount = $songCount;
        $this->albumId = $albumId;
    }

    /**
     * @return int
     */
    public function getSongId(): int
    {
        return $this->songId;
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
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getSongCount(): int
    {
        return $this->songCount;
    }

    /**
     * @return int
     */
    public function getAlbumId(): int
    {
        return $this->albumId;
    }
}
