<?php
require 'vendor/autoload.php';

use Musicplayer\Database\SongDao;

// Allow requests from any origin
header("Access-Control-Allow-Origin: http://localhost:3000");

header("Access-Control-Allow-Headers: Content-Type");

// Set response content type
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

$song = $data["name"];
$artist = $data["artist"];

$songDao = new SongDao();
try {
    $song = $songDao->fetchSongFromNameAndArtist($song, $artist);
}
catch (Exception $exception) {
    http_response_code(400);
    $data = json_encode(["message" => "Invalid song data", "data" => []]);
    echo $data;
    exit;
}

try {

//Song DAO should have incrementSongPlayedCount
    $data = json_encode(["message" => "Successfully recorded play."], true);
//$data = json_encode(["message"=> $song . " " . $artist],true);
}
catch (Exception $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error", "data" => []]);
}
echo $data;


// NowPlaying/index.js is the file that can send the now playing back to php