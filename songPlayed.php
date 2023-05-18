<?php
require 'vendor/autoload.php';

use Musicplayer\Database\SongDao;

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$artist = $data["artist"];

$songDao = new SongDao();

try {
    $song = $songDao->fetchSongFromNameAndArtist($name, $artist);
} catch (Exception $exception) {
    http_response_code(400);
    $data = json_encode(["message" => "Invalid song data", "data" => []]);
    echo $data;
    exit;
}

try {
    $songSuccess = $songDao->incrementSongPlayedCount($song->getSongId());
    $albumSuccess = $songDao->incrementAlbumPlayedCount($song->getAlbumId());
    $song->setLastPlayTimestamp(date('Y-m-d H:i:s'));
    $songDao->addLastPlayedTimestamp($song->getSongId(), $song->getLastPlayTimestamp());

    if (!$songSuccess || !$albumSuccess) {
        throw new Exception();
    } else {
        http_response_code(201);
        $data = json_encode(["message" => "Successfully recorded play."], true);
    }
} catch (Exception $exception) {
    http_response_code(500);
    $data = json_encode(["message" => "Unexpected error", "data" => []]);
}

echo $data;
