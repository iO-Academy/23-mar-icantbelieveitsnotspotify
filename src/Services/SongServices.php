<?php

namespace Musicplayer\Services;

use Musicplayer\Database\AlbumDao;
use Musicplayer\Database\ArtistDao;
use Musicplayer\Database\SongDao;
use Musicplayer\Entities\Song;

class SongServices
{
    public function convertArrayOfArraysToArrayOfSongs(array $rows): array
    {
        $songs = [];
        foreach ($rows as $row) {
            $song = new Song($row['id'], $row['song_name'], $row['length'], $row['play_count'], $row['album_id'], $row['is_fav']);
            $songs[] = $song;
        }
        return $songs;
    }

    public function convertArrayOfArraysToArrayOfSongStrings(array $songs): array
    {
        $songStrings = [];
        foreach ($songs as $song) {
            $songStrings[] = $song['song_name'];
        }
        return $songStrings;
    }

    public function formatRecentSongsJSONResponse(): array
    {
        $artistDao = new ArtistDao();
        $albumDao = new AlbumDao();
        $songDao = new SongDao();

        $recentSongs = $songDao->getRecentPlayedSongArray();
        $recentSongOutput = [];

        foreach ($recentSongs as $song) {

                $current = new Song(
                    $song['id'],
                    $song['song_name'],
                    $song['length'],
                    $song['play_count'],
                    $song['album_id'],
                    $song['is_fav'],
                    ($song['last_play_timestamp'] ?: '')
                );

            $album = $albumDao->fetchAlbumFromAlbumId($current->getAlbumId());
            $artist = $artistDao->createArtistFromArtistId($album->getArtistId());

            $recentSongOutput[] = [
                'name' => $current->getSongName(),
                'artist' => $artist->getArtistName(),
                'length' => $current->getLength(),
                'artwork_url' => $album->getArtworkUrl(),
                'is_fav' => $current->getIsFav()
            ];
        }
        return $recentSongOutput;
    }
}
