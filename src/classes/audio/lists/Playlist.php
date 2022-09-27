<?php

namespace iutnc\deefy\audio\lists;


use iutnc\deefy\audio\tracks\AudioTrack;

class Playlist extends AudioList
{

    public function __construct(string $nom, array $pistes = [])
    {
        parent::__construct($nom, $pistes);
    }

    public function addPiste(AudioTrack $audioTrack) : void {
        if (!in_array($audioTrack, (array)$this->pistes)) {
            $this->pistes = $audioTrack;
            $this->nbPistes++;
            $this->duree += $audioTrack->duree;
        }
    }

    public function removePiste(int $indice) : void {
        unset($this->pistes[$indice]);
    }

    public function addMultiplePiste(array $pistes) : void {
        foreach ($pistes as $piste) {
            $this->addPiste($piste);
        }
    }

}