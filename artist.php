<?php

require "vendor/autoload.php";

use Musicplayer\Services\ArtistServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$artistServices = new ArtistServices();

try {
    http_response_code(200);
    $fetchedData = $artistServices->formatArtistJSONResponse($_GET['name']);
    $data = json_encode($fetchedData);
}  catch (\PDOException $e) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
} catch (\Exception $e) {
    http_response_code(400);
    $data = json_encode(["message" => "Unknown artist name"]);
}

echo $data;
