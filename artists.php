<?php

namespace Musicplayer;
require "vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

use Musicplayer\Services\ArtistsServices;


$artistsServices = new ArtistsServices();

try {
    http_response_code(200);
    $fetchedData = $artistsServices->formatArtistsJSONResponse();
    echo json_encode($fetchedData);
}
catch (Exception $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error", "data" => []]);
    echo $data;
    exit;
}