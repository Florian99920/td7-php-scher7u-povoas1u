<?php

namespace iutnc\deefy\render;



use iutnc\deefy\audio\tracks\AudioTrack;

class AudioTrackRenderer implements Renderer {

    public AudioTrack $piste;

    public function __construct(AudioTrack $p)  {
        $this->piste = $p;
    }

    public function render(int $selector=1) : string {
        $html = "";

        if ($selector == Renderer::COMPACT) {
            $html = $this->short();
        } else if ($selector == Renderer::LONG){
            $html = $this->long();
        }
        return $html;
    }
    
    private function short() : string {
        return "<p>{$this->piste->titre} <audio controls src = '{$this->piste->chemin}'></audio></p>\n";
    }

    private function long() : string {
        return "<p>{$this->piste->titre} - by {$this->piste->artiste} <audio controls src = '{$this->piste->chemin}'></audio></cccp>\n";
    }

}