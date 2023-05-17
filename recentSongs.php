<?php

require "vendor/autoload.php";

use Musicplayer\Services\SongServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$songServices = new SongServices();

try {
    http_response_code(200);
    $fetchedData = $songServices->formatRecentSongsJSONResponse();
    $data = json_encode($fetchedData);
} catch (\PDOException $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}

echo $data;