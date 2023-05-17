<?php

require "vendor/autoload.php";

use Musicplayer\Services\AlbumServices;

$albumServices = new AlbumServices();
$albumServices->convertArrayOfArraysToArrayOfAlbums();