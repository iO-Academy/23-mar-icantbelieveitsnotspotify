<?php

namespace Musicplayer\Database;

require 'vendor/autoload.php';







// Use get song objects from Album ID
// Get song info

function jsonReturnSpecificArtist($artistName)
{
    $artistDao = new ArtistDao();
    $albumDao = new AlbumDao();
    $songDao = new SongDao();


    // Get artist Id from 'name' (error response to think about in future)
    $artistId = $artistDao->fetchArtistIdFromArtistName($artistName);

    // Get album objects from Artist ID
    $albums = $albumDao->fetchAllAlbumsFromArtistId($artistId['id']);

    $artistInfoArray['name'] = $artistName;

    foreach ($albums as $album) {
        $artistInfoArray['albums'] = $album->getAlbumName();
        $albumId = $album->getAlbumId();
        $albumIdArr[] = $albumId;

        $songs = $songDao->fetchAllSongsFromAlbumId($albumId);

        $songJson = '"songs": [';

        foreach ($songs as $song) {


            $songJson .= '
                         {
                         "name": "' . $song->getSongName() . '", 
                        "length": "' . $song->getLength() . '"
                          },';
        }

        $albumJson =   '"albums": [';

        $albumJson .= '
                    {
                    "name": "' . $album->getAlbumName() . '", 
                    '   . rtrim($songJson, ',')
                        .  '], 
                         "artwork_url": "' . $album->getArtworkUrl() . '"
                        }
                      ]';

    }

    $jsonString = json_encode($artistInfoArray);
    return $jsonString;
}
// Receive 'name' from URL ($_GET['name'])
$artistNameFromUrl = $_GET['name'];

$jsonString = jsonReturnSpecificArtist($artistNameFromUrl);
json_encode($jsonString);
echo '<pre>';
var_dump($jsonString);
echo '</pre>';






//$jsonString = '{
//                    "name": "' . $artistName . '",
//                        '; // start of json string
//
//$albumIdArr = [];
//foreach ($albums as $album) {
//    $albumId = $album->getAlbumId();
//    $albumIdArr[] = $albumId;
//
//    $songs = $songDao->fetchAllSongsFromAlbumId($albumId);
//    echo '<pre>';
//    var_dump($songs);
//    echo '</pre>';
//    $songJson = '"songs": [';
//
//    foreach ($songs as $song) {
//
//
//        $songJson .= '
//                         {
//                         "name": "' . $song->getSongName() . '",
//                        "length": "' . $song->getLength() . '"
//                          },';
//    }
//
//    $albumJson =   '"albums": [';
//
//    $albumJson .= '
//                    {
//                    "name": "' . $album->getAlbumName() . '",
//                    '   . rtrim($songJson, ',')
//        .  '],
//                         "artwork_url": "' . $album->getArtworkUrl() . '"
//                        }
//                      ]';
//    $jsonString .= $albumJson;
//}




//
//echo '<pre>';
//$artistDao = new ArtistDao();
//$artistTest = $artistDao->createArtistFromArtistId(8);
//print_r($artistTest);
//echo '</pre>';
//
//echo '<pre>';
//$albumDao = new AlbumDao();
//$test = $albumDao->fetchAlbumFromAlbumId(7);
//print_r($test);
//echo '</pre>';
//
//echo '<pre>';
//$test = $albumDao->fetchAllAlbumsFromArtistId(3);
//print_r($test);
//echo '</pre>';
//
//echo '<pre>';
//$songDao = new SongDao();
//$songTest = $songDao->fetchSongFromSongId(8);
//print_r($songTest);
//echo '</pre>';
//
//
//echo '<pre>';
//$songTest = $songDao->fetchAllSongsFromAlbumId(5);
//print_r($songTest);
//echo '</pre>';
//
//
////echo '<pre>';
////var_dump($_GET);
////echo '</pre>';
//echo '<pre>';
//$artistDao = new ArtistDao();
//$artistNameFromUrl = $_GET['name'];
//$artistId = $artistDao->fetchArtistIdFromArtistName($artistNameFromUrl);
//var_dump($artistId['id']);
//echo '</pre>';
//function jsonArtist($artistNameFromUrl)
//{
//    // Use artistId to create json below
//
//
//}


//{
//    "name": "Billie Eilish",
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