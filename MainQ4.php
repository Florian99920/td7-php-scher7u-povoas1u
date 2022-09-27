<?php

use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\render\AlbumTrackRenderer;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\render\PodcastTrackRenderer;

require_once 'vender/autoload.php';


$p = new PodcastTrack('Ce podcast', 'audio/03-Country_Girl-BB_King-Lucille.mp3', 54);
$r = new PodcastTrackRenderer($p);

$t = new AlbumTrack("thriller", "audio/01-Im_with_you_BB-King-Lucille.mp3", 68) ;
$r = new AlbumTrackRenderer($t);

$playlist = new Playlist("Ma playlist");

$playlist->addPiste($p);
$playlist->addPiste($t);

$renderer = new AudioListRenderer($playlist);

print $renderer->render() ; // 1 = mode compact