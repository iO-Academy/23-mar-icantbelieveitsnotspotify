<?php

namespace Musicplayer\Entities;

class Song
{
    private int $songId;
    private string $songName;
    private float $length;
    private int $albumId;

    public function __construct($songId, $songName, $length, $albumId)
    {
        $this->songId = $songId;
        $this->songName = $songName;
        $this->length = $length;
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
     * @return string
     */
    public function getLength(): string
    {
        return date('i:s', round((floor($this->length) * 60) + ($this->length - floor($this->length)) * 100));
    }

    /**
     * @return int
     */
    public function getAlbumId(): int
    {
        return $this->albumId;
    }
}
