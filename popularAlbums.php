<?php

require "vendor/autoload.php";

use Musicplayer\Services\AlbumServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$albumServices = new AlbumServices();

try {
    http_response_code(200);
    $fetchedData = $albumServices->formatPopularAlbumsJSONResponse();
    $data = json_encode($fetchedData);
} catch (\Exception $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error", "data" => []]);
}

echo $data;
