<?php

namespace iutnc\deefy\audio\tracks;

use Exception;
use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\InvalidPropertyValueException;
use iutnc\deefy\exception\NonEditablePropertyException;

class AudioTrack {

    protected string $titre;

    protected string $artiste;

    protected int $date;

    protected string $genre;

    protected int $duree;

    protected string $chemin;

    public function __construct(string $t, string $c, int $duree)
    {
        $this->chemin = $c;
        $this->titre = $t;
        $this->duree = $duree;
    }

    public function __get(string $at): mixed {
        if (property_exists ($this, $at)) return $this->$at;
        throw new InvalidPropertyNameException ("$at: invalid property name");
    }

    public function __set(string $at,mixed $val):void {
        if ( property_exists ($this, $at) ) {
            if ($at == 'titre' or $at == 'chemin') {
                throw new NonEditablePropertyException("$at: non-editable property");
            }
            if ($at == 'duree' and $val < 0) {
                throw new InvalidPropertyValueException("$val: invalid property value");
            }
            $this->$at = $val;
        } else throw new Exception ("$at: invalid property");
    }


}