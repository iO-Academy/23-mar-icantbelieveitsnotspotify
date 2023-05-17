<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Musicplayer\Services\ArtistServices;
use Musicplayer\Entities\Artist;

class ArtistServicesTest extends TestCase
{
    public function testConvertArrayOfArraysToArrayOfArtistsGivenArrayOfArraysReturnArrayOfArtists()
    {
        $input = [['id' => 1, 'artist_name' => 'Billie Eilish'],
            ['id' => 2, 'artist_name' => 'Beyonce'],
            ['id' => 3, 'artist_name' => 'Taylor Swift'],
            ['id' => 4, 'artist_name' => 'Will Smith'],
            ['id' => 18, 'artist_name' => 'The Ting Tings']];

        $expected = [new Artist(1, 'Billie Eilish'),
            new Artist(2, 'Beyonce'),
            new Artist(3, 'Taylor Swift'),
            new Artist(4, 'Will Smith'),
            new Artist(18, 'The Ting Tings')];
        $artistServices = new ArtistServices();
        $result = $artistServices->convertArrayOfArraysToArrayOfArtists($input);
        $this->assertEquals($expected, $result);
    }

    public function testConvertArrayOfArraysToArrayOfArtistsChecksIfArrayIsNotEmpty()
    {
        $input = [['id' => 1, 'artist_name' => 'Billie Eilish'],
            ['id' => 2, 'artist_name' => 'Beyonce'],
            ['id' => 3, 'artist_name' => 'Taylor Swift'],
            ['id' => 4, 'artist_name' => 'Will Smith'],
            ['id' => 18, 'artist_name' => 'The Ting Tings']];

        $artistServices = new ArtistServices();
        $result = $artistServices->convertArrayOfArraysToArrayOfArtists($input);
        $this->assertNotEmpty($result);
    }

    public function testConvertArrayOfArraysToArrayOfArtistsChecksIfArrayIsArray()
    {
        $input = null;
        $artistServices = new ArtistServices();
        $this->expectException(\TypeError::class);
        $artistServices->convertArrayOfArraysToArrayOfArtists($input);
    }

    public function testConvertArrayOfArraysToArrayOfArtistsChecksIfGivenEmptyArrayReturnsEmptyArray()
    {
        $input = [];
        $expected = [];
        $artistServices = new ArtistServices();
        $result = $artistServices->convertArrayOfArraysToArrayOfArtists($input);
        $this->assertEquals($expected, $result);
    }
}
