<?php

namespace Musicplayer\Entities;

class Song
{
    private int $songId;
    private string $songName;
    private float $length;
    private int $albumId;
    private string $lastPlayTimestamp;


    public function __construct($songId, $songName, $length, $albumId, $lastPlayTimestamp = null)
    {
        $this->songId = $songId;
        $this->songName = $songName;
        $this->length = $length;
        $this->albumId = $albumId;
        $this->lastPlayTimestamp = $lastPlayTimestamp;
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

    /**
     * @return string
     */
    public function getLastPlayTimestamp(): string
    {
        return $this->lastPlayTimestamp;
    }

    /**
     * @param string $lastPlayTimestamp
     */
    public function setLastPlayTimestamp(string $lastPlayTimestamp): void
    {
        $this->lastPlayTimestamp = $lastPlayTimestamp;
    }
}
