<?php


// Allow requests from any origin
header("Access-Control-Allow-Origin: http://localhost:3000");

header("Access-Control-Allow-Headers: Content-Type");

// Set response content type
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

$song = $data["name"];
$artist = $data["artist"];

//validation. using song DAO can it find song. send back Code: 400 BAD REQUEST
//Content: {"message": "Invalid song data", "data": []}


try {
//DAO Goes here
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