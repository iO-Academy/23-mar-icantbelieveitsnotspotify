<?php
require "vendor/autoload.php";

use Musicplayer\Database\SongDao;
use Musicplayer\Services\SongServices;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Content-Type: application/json');

$songDao = new SongDao();
$songServices = new SongServices();

$searchQuery = $_GET['name'];

try {
    http_response_code(200);

    if ($searchQuery === null) {
        $searchResults = []; // Handle the case where $searchQuery is null
    } else {
        $searchResults = $songDao->getSearchResults($searchQuery);
        $searchResults = $songServices->formatSearchResultsJSONResponse($searchResults);
    }

    $data = json_encode($searchResults);

} catch (\PDOException $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}

echo $data;
