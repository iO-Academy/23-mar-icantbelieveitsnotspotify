<?php

namespace Musicplayer;
require "vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//$artistsDao = new ArtistsDao();
//
//$artists = $artistsDao->fetchAll();
//
//$artistsJson = json_encode($artists);
//
//
//echo $artistsJson;

use Musicplayer\Database\ArtistDao;
use Musicplayer\Services\ArtistsServices;

//$artistsDao = new ArtistDao();
//$artists = $artistsDao->fetchAllArtists();
//
//echo '<pre>';
//print_r($artists);
//echo '</pre>';

$artistsServices = new ArtistsServices();
$fetchedData = $artistsServices->formatArtistsJSONResponse();

echo json_encode($fetchedData);
