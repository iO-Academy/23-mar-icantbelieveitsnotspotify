<?php
require "vendor/autoload.php";

use Musicplayer\Database\SongDao;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$songDao = new SongDao();

$searchQuery = $_GET['name'];

try {
    http_response_code(200);

    if ($searchQuery === null) {
        $searchResults = [];
    } else {
        $searchResults = $songDao->getSearchResults($searchQuery);
    }
    foreach ($searchResults as &$song) {
        $song['is_fav'] = (bool)$song['is_fav'];
    }

    $data = json_encode($searchResults);
} catch (\PDOException $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}


echo $data;
