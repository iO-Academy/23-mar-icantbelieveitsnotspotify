<?php


require "vendor/autoload.php";

use Musicplayer\test\ArtistsDAO;

$artistsDAO = new ArtistsDAO;

$artists = $artistsDAO->fetchAll();

$artistsJson = json_encode($artists);

header('Content-Type: application/json');

echo $artistsJson;

