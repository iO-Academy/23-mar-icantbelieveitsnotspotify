<?php

require "vendor/autoload.php";


use Musicplayer\Services\ArtistsServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$artistsServices = new ArtistsServices();

try {
    http_response_code(200);
    $fetchedData = $artistsServices->formatArtistsJSONResponse();
    $data = json_encode($fetchedData);
} catch (\Exception $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error", "data" => []]);
}
echo $data;
