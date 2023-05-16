<?php

namespace Musicplayer\Database;

require 'vendor/autoload.php';


//class ArtistServices
//{
//    private string $artistNameFromUrl; // = $_GET['name'];
//    private int $artistId; // = $artistDao->fetchArtistIdFromArtistName($artistNameFromUrl);
//    private array $albums; // = fetchAllAlbumsFromArtistId($artistId)
//    private int $albumId; //
//    private string $album; // = $albumDao->fetchAlbumFromAlbumId();
//    private array $songs; // = $songDao->fetchAllSongsFromAlbumId();

    // Receive 'name' from URL ($_GET['name'])
// Get artist Id from 'name' (error response to think about in future)
// Get album objects from Artist ID
// Get album ID, name and artwork_URL using album getters
// Use get song objects from Album ID
// Get song info

//    public function jsonReturnSpecificArtist($artistNameFromUrl)
//    {
//        $artistDao = new ArtistDao();
//        $albumDao = new AlbumDao();
//
//        $artistId = $artistDao->fetchArtistIdFromArtistName($artistNameFromUrl);
//        $albums = $albumDao->fetchAllAlbumsFromArtistId($artistId['id']);
//
//
//        return 'Hello';
//    }
//}

//    '"name": , //$artistNameFromUrl = $_GET['name'];
//"albums": [
//{
//"name": ,
//"songs": [
//{
//"name": ,
//"length":
//},
//{
//    "name": ,
//
//        },
//{
//    "name": ,
//          "length":
//        }
//],
//"artwork_url":
//    }
//  ]
//}
//}'



//echo '<pre>';
//$artistDao = new ArtistDao();
////$artistNameFromUrl = $_GET['name'];
////var_dump($artistId['id']);
//$artistNameFromUrl = 'Billie Eilish';
//print_r($artistNameFromUrl);
//echo '</pre>';
//
//// array of artists album objects
//echo '<pre>';
//$artistId = $artistDao->fetchArtistIdFromArtistName($artistNameFromUrl);
////print_r($artistId);
//$albumDao = new AlbumDao();
//$albums = $albumDao->fetchAllAlbumsFromArtistId($artistId['id']);
//print_r($albums);
//echo '</pre>';
//
//// array of artists album ids
//echo '<pre>';
//$albumIds = [];
//foreach ($albums as $album) {
//        $albumId = $album->getAlbumId();
//        $albumIds[] = $albumId;
//    }
//    print_r($albumIds);
//
//// array of artists album names
//echo '<pre>';
//$albumNames = [];
//foreach ($albums as $album) {
//    $albumName = $album->getAlbumName();
//    $albumNames[] = $albumName;
//}
//print_r($albumNames);
//
//// single album object
//$artistAlbums = [];
//foreach ($albumIds as $albumId) {
//    $albumData = $albumDao->fetchAlbumFromAlbumId($albumId);
//    $artistAlbums[] = $albumData;
//}
//print_r($artistAlbums);
//echo '</pre>';
//
// individual song from id
//echo '<pre>';
$songDao = new SongDao();
//$songs = $songDao->fetchSongFromSongId(8);
//print_r($songs);
//echo '</pre>';

// all songs on an album
echo '<pre>';
$songTest = $songDao->fetchAllSongsFromAlbumId(5);
print_r($songTest);
echo '</pre>';

//{
//    "name": "Billie Eilish", //$artistNameFromUrl = $_GET['name'];
//  "albums": [
//    {
//        "name": "When We All Fall Asleep, Where Do We Go?",
//      "songs": [
//        {
//            "name": "bad guy",
//          "length": "3:28"
//        },
//        {
//            "name": "bury a friend",
//          "length": "3:28"
//        },
//        {
//            "name": "you should see me in a crown",
//          "length": "3:28"
//        }
//      ],
//      "artwork_url": "https://via.placeholder.com/400x400/386641/6A994E?text=The+Memory+of+Trees"
//    }
//  ]
//}
//}