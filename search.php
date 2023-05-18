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
        $searchResults = []; // Handle the case where $searchQuery is null
    } else {
        $searchResults = $songDao->getSearchResults($searchQuery);
//        foreach ($searchResults as $result) {
//            print_r($result['is_fav']);
//                $result['is_fav'] = 8;
//        }
        for ($i = 0; $i < sizeof($searchResults); $i++) {

            $searchResults[$i]['length'] = ltrim(date('i:s', round((floor($searchResults[$i]['length']) * 60) +
                ($searchResults[$i]['length'] - floor($searchResults[$i]['length'])) * 100)), '0');

            if ($searchResults[$i]['is_fav'] === 0) {
                $searchResults[$i]['is_fav'] = false;
            } else {
                $searchResults[$i]['is_fav'] = true;
            }
        }

    }

    $data = json_encode($searchResults);

} catch (\PDOException $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error"]);
}

echo $data;
