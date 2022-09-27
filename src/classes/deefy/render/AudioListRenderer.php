<?php

namespace iutnc\deefy\render;


use iutnc\deefy\audio\lists\AudioList;

class AudioListRenderer implements Renderer
{
    public AudioList $audioList;

    public function __construct(AudioList $a)  {
        $this->audioList = $a;
    }

    public function render(int $selector = 1): string
    {
        $s = "<p>{$this->audioList->nom}</p>\n";

        foreach ($this->audioList->pistes as $piste) {
            $audioRenderer = new AudioTrackRenderer($piste);
            $s = $s . $audioRenderer->render(1);
        }

        return $s . "<p>{$this->audioList->nbPistes} pistes, {$this->audioList->duree} s</p>\n";
    }
}