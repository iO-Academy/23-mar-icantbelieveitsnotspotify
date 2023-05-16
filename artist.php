<?php

namespace Musicplayer;
require "vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

use Musicplayer\Services\ArtistServices;

$artistServices = new ArtistServices();
try {
    http_response_code(200);
    $fetchedData = $artistServices->formatArtistJSONResponse($_GET['name']);
    $data = json_encode($fetchedData);
}  catch (\PDOException $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
} catch (\Exception $e) {
    http_response_code(400);
    $data = json_encode(["message" => "Unknown artist name"]);
}
echo $data;
