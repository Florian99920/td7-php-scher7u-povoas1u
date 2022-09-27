<?php

namespace iutnc\deefy\audio\tracks;

class PodcastTrack extends AudioTrack {

    public function __construct(string $t, string $c, int $duree)
    {   
        parent::__construct($t, $c, $duree);
    }

    public function __toString() : string
    {
        return json_encode($this);
    }
}
