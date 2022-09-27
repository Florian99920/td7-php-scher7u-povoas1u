<?php

require_once 'src/classes/deefy/audio/tracks/AudioTrack.php';
require_once 'src/classes/deefy/audio/tracks/AlbumTrack.php';
require_once 'src/classes/deefy/audio/tracks/PodcastTrack.php';

require_once 'src/classes/deefy/audio/lists/AudioList.php';
require_once 'src/classes/deefy/audio/lists/Album.php';
require_once 'src/classes/deefy/audio/lists/Playlist.php';

require_once 'src/classes/deefy/exception/InvalidPropertyValueException.php';
require_once 'src/classes/deefy/exception/InvalidPropertyNameException.php';
require_once 'src/classes/deefy/exception/NonEditablePropertyException.php';

require_once 'src/classes/deefy/render/Renderer.php';
require_once 'src/classes/deefy/render/AudioListRenderer.php';
require_once 'src/classes/deefy/render/AudioTrackRenderer.php';
require_once 'src/classes/deefy/render/AlbumTrackRenderer.php';
require_once 'src/classes/deefy/render/PodcastTrackRenderer.php';


use iutnc\deefy\audio\lists\Playlist;
use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\render\AlbumTrackRenderer;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\render\PodcastTrackRenderer;


$p = new PodcastTrack('Ce podcast', 'audio/03-Country_Girl-BB_King-Lucille.mp3', 54);
    $r = new PodcastTrackRenderer($p);

    $t = new AlbumTrack("thriller", "audio/01-Im_with_you_BB-King-Lucille.mp3", 68) ;
    $r = new AlbumTrackRenderer($t);

    $playlist = new Playlist("Ma playlist");

    $playlist->addPiste($p);
    $playlist->addPiste($t);

    $renderer = new AudioListRenderer($playlist);

    print $renderer->render() ; // 1 = mode compact