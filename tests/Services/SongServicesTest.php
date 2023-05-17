<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Musicplayer\Services\SongServices;
use Musicplayer\Entities\Song;

class SongServicesTest extends TestCase
{
    public function testConvertArrayOfArraysToArrayOfSongsGivenArrayOfArraysReturnArrayOfSongs()
    {
        $input = [['id' => 1, 'song_name' => 'bad guy', 'length' => 3.32, 'play_count' => 0, 'album_id' => 1],
                  ['id' => 2, 'song_name' => 'bury a friend', 'length' => 3.00, 'play_count' => 0, 'album_id' => 1],
                  ['id' => 3, 'song_name' => 'you should see me in a crown', 'length' => 3.45, 'play_count' => 0, 'album_id' => 1],
                  ['id' => 4, 'song_name' => 'NDA', 'length' => 3.14, 'play_count' => 0, 'album_id' => 2],
                  ['id' => 5, 'song_name' => 'Therefore I Am', 'length' => 3.29, 'play_count' => 0, 'album_id' => 2],
        ];

        $expected = [
          new Song(1, 'bad guy', 3.32, 0, 1),
          new Song(2, 'bury a friend', 3.00, 0,1),
          new Song(3, 'you should see me in a crown', 3.45, 0, 1),
          new Song(4, 'NDA', 3.14, 0, 2),
          new Song(5, 'Therefore I Am', 3.29, 0, 2),
        ];

        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongs($input);
        $this->assertEquals($expected, $result);
    }

    public function testConvertArrayOfArraysToArrayOfSongsChecksIfArrayIsNotEmpty()
    {
        $input = [['id' => 1, 'song_name' => 'bad guy', 'length' => 3.32, 'play_count' => 0, 'album_id' => 1],
            ['id' => 2, 'song_name' => 'bury a friend', 'length' => 3.00, 'play_count' => 0, 'album_id' => 1],
            ['id' => 3, 'song_name' => 'you should see me in a crown', 'length' => 3.45, 'play_count' => 0, 'album_id' => 1],
            ['id' => 4, 'song_name' => 'NDA', 'length' => 3.14, 'play_count' => 0, 'album_id' => 2],
            ['id' => 5, 'song_name' => 'Therefore I Am', 'length' => 3.29, 'play_count' => 0, 'album_id' => 2],
        ];

        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongs($input);
        $this->assertNotEmpty($result);
    }

    public function testConvertArrayOfArraysToArrayOfSongsChecksIfArrayIsArray()
    {
        $input = null;
        $songServices = new SongServices();
        $this->expectException(\TypeError::class);
        $songServices->convertArrayOfArraysToArrayOfSongs($input);
    }

    public function testConvertArrayOfArraysToArrayOfSongsChecksIfGivenEmptyArrayReturnsEmptyArray()
    {
        $input = [];
        $expected = [];
        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongs($input);
        $this->assertEquals($expected, $result);
    }

    public function testConvertArrayOfArraysToArrayOfSongStringsGivenArrayOfArraysReturnArrayOfSongStrings()
    {
        $input = [['id' => 1, 'song_name' => 'bad guy', 'length' => 3.32, 'play_count' => 0, 'album_id' => 1],
            ['id' => 2, 'song_name' => 'bury a friend', 'length' => 3.00, 'play_count' => 0, 'album_id' => 1],
            ['id' => 3, 'song_name' => 'you should see me in a crown', 'length' => 3.45, 'play_count' => 0, 'album_id' => 1],
            ['id' => 4, 'song_name' => 'NDA', 'length' => 3.14, 'play_count' => 0, 'album_id' => 2],
            ['id' => 5, 'song_name' => 'Therefore I Am', 'length' => 3.29, 'play_count' => 0, 'album_id' => 2],
        ];

        $expected = ['bad guy', 'bury a friend', 'you should see me in a crown', 'NDA', 'Therefore I Am'];
        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongStrings($input);
        $this->assertEquals($expected, $result);
    }

    public function testConvertArrayOfArraysToArrayOfSongsStringsChecksIfArrayIsNotEmpty()
    {
        $input = [['id' => 1, 'song_name' => 'bad guy', 'length' => 3.32, 'play_count' => 0, 'album_id' => 1],
            ['id' => 2, 'song_name' => 'bury a friend', 'length' => 3.00, 'play_count' => 0, 'album_id' => 1],
            ['id' => 3, 'song_name' => 'you should see me in a crown', 'length' => 3.45, 'play_count' => 0, 'album_id' => 1],
            ['id' => 4, 'song_name' => 'NDA', 'length' => 3.14, 'play_count' => 0, 'album_id' => 2],
            ['id' => 5, 'song_name' => 'Therefore I Am', 'length' => 3.29, 'play_count' => 0, 'album_id' => 2],
        ];

        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongStrings($input);
        $this->assertNotEmpty($result);
    }

    public function testConvertArrayOfArraysToArrayOfSongStringsChecksIfArrayIsArray()
    {
        $input = null;
        $songServices = new SongServices();
        $this->expectException(\TypeError::class);
        $songServices->convertArrayOfArraysToArrayOfSongStrings($input);
    }

    public function testConvertArrayOfArraysToArrayOfSongStringsChecksIfGivenEmptyArrayReturnsEmptyArray()
    {
        $input = [];
        $expected = [];
        $songServices = new SongServices();
        $result = $songServices->convertArrayOfArraysToArrayOfSongStrings($input);
        $this->assertEquals($expected, $result);
    }
}
