<?php

namespace Musicplayer\Entities;

class Song
{
    private int $songId;
    private string $songName;
    private float $length;
    private int $playCount;
    private int $albumId;
    private bool $isFav;
    private string $lastPlayTimestamp;

    public function __construct($songId, $songName, $length, $playCount, $albumId, $isFav, $lastPlayTimestamp = '')

    {
        $this->songId = $songId;
        $this->songName = $songName;
        $this->length = $length;
        $this->playCount= $playCount;
        $this->albumId = $albumId;
        $this->isFav = $isFav;
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
    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    /**
     * @return int
     */
    public function getPlayCount(): int
    {
        return $this->playCount;
    }

    /**
     * @return bool
     */
    public function getIsFav(): bool
    {
        return $this->isFav;
    }

    /**
     * @param bool $isFav
     */
    public function setIsFav(bool $isFav): void
    {
        $this->isFav = $isFav;
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
