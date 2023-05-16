<?php

namespace Musicplayer;
require "vendor/autoload.php";
//header('Content-Type: application/json');

//$artistsDao = new ArtistsDao();
//
//$artists = $artistsDao->fetchAll();
//
//$artistsJson = json_encode($artists);
//
//
//echo $artistsJson;

use Musicplayer\Database\ArtistDao;

$artistsDao = new ArtistDao();

$artists = $artistsDao->fetchAllArtists();

echo '<pre>';
print_r($artists);
echo '</pre>';

