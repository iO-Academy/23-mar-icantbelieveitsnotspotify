<?php

require_once ArtistsDao.php;
	
$artistsDao = new ArtistsDao();

$artists = $artistsDao->fetchAll();

$artistsJson = json_encode($artists);

header('Content-Type: application/json')

echo $artistsJson;

