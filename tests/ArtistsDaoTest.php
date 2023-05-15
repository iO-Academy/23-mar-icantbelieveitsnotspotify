<?php

require_once __DIR__ . '/../src/ArtistsDao.php';
require_once __DIR__ . '/../src/artist.php';
use PHPUnit\Framework\TestCase;

class ArtistsDaoTest extends TestCase
{
    public function testFetchAll()
    {
        $artistsDao = new ArtistsDao();
        $artists = $artistsDao->fetchAll();

        $this->assertIsArray($artists);
        $this->assertNotEmpty($artists);
    }
}
