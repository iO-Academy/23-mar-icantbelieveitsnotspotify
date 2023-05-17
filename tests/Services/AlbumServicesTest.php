<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Musicplayer\Services\AlbumServices;
use Musicplayer\Entities\Album;

class AlbumServicesTest extends TestCase
{
    public function testConvertArrayOfArraysToArrayOfAlbumsGivenArrayOfArraysReturnArrayOfAlbums()
    {
        $input = [['id' => 1,
            'album_name' => 'When We All Fall Asleep, Where Do We Go?',
            'artwork_url' => 'https://via.placeholder.com/400x400/466365/B49A67?text=When+We+All+Fall+Asleep%2C+Where+Do+We+Go%3F',
            'artist_id' => 1],
                ['id' => 2,
                'album_name' => 'Happier Than Ever',
                'artwork_url' => 'https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Happier+Than+Ever',
                'artist_id' => 1],
                ['id' => 3,
                'album_name' => 'Lemonade',
                'artwork_url' => 'https://via.placeholder.com/400x400/466365/B49A67?text=Lemonade',
                'artist_id' => 2],
                ['id' => 4,
                'album_name' => 'BEYONCE',
                'artwork_url' => 'https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=BEYONCE',
                'artist_id' => 2],
                ['id' => 45,
                'album_name' => 'Super Critical',
                'artwork_url' => 'https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Super+Critical',
                'artist_id' => 18]
            ];

        $expected = [
            new Album(1,'When We All Fall Asleep, Where Do We Go?', 'https://via.placeholder.com/400x400/466365/B49A67?text=When+We+All+Fall+Asleep%2C+Where+Do+We+Go%3F', 1),
            new Album(2, 'Happier Than Ever', 'https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Happier+Than+Ever', 1),
            new Album(3, 'Lemonade', 'https://via.placeholder.com/400x400/466365/B49A67?text=Lemonade', 2),
            new Album(4, 'BEYONCE', 'https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=BEYONCE',2),
            new Album(45, 'Super Critical', 'https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Super+Critical', 18)
            ];

        $albumServices = new AlbumServices();
        $result = $albumServices->convertArrayOfArraysToArrayOfAlbums($input);
        $this->assertEquals($expected, $result);
    }

    public function testConvertArrayOfArraysToArrayOfAlbumsChecksIfArrayIsNotEmpty()
    {
        $input = [['id' => 1,
            'album_name' => 'When We All Fall Asleep, Where Do We Go?',
            'artwork_url' => 'https://via.placeholder.com/400x400/466365/B49A67?text=When+We+All+Fall+Asleep%2C+Where+Do+We+Go%3F',
            'artist_id' => 1],
            ['id' => 2,
                'album_name' => 'Happier Than Ever',
                'artwork_url' => 'https://via.placeholder.com/400x400/ED254E/F9DC5C?text=Happier+Than+Ever',
                'artist_id' => 1],
            ['id' => 3,
                'album_name' => 'Lemonade',
                'artwork_url' => 'https://via.placeholder.com/400x400/466365/B49A67?text=Lemonade',
                'artist_id' => 2],
            ['id' => 4,
                'album_name' => 'BEYONCE',
                'artwork_url' => 'https://via.placeholder.com/400x400/9DC5BB/DEE5E5?text=BEYONCE',
                'artist_id' => 2],
            ['id' => 45,
                'album_name' => 'Super Critical',
                'artwork_url' => 'https://via.placeholder.com/400x400/05A8AA/B8D5B8?text=Super+Critical',
                'artist_id' => 18]
        ];

        $albumServices = new AlbumServices();
        $result = $albumServices->convertArrayOfArraysToArrayOfAlbums($input);
        $this->assertNotEmpty($result);
    }

    public function testConvertArrayOfArraysToArrayOfAlbumsChecksIfArrayIsArray()
    {
        $input = null;
        $albumServices = new AlbumServices();
        $this->expectException(\TypeError::class);
        $albumServices->convertArrayOfArraysToArrayOfAlbums($input);
    }

    public function testConvertArrayOfArraysToArrayOfArtistsChecksIfGivenEmptyArrayReturnsEmptyArray()
    {
        $input = [];
        $expected = [];
        $albumServices = new AlbumServices();
        $result = $albumServices->convertArrayOfArraysToArrayOfAlbums($input);
        $this->assertEquals($expected, $result);
    }
}
