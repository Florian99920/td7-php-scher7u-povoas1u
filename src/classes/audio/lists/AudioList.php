<?php

namespace iutnc\deefy\audio\lists;

use Exception;
use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\NonEditablePropertyException;

class AudioList
{

    private string $nom;

    private int $nbPistes;

    private int $duree;

    private array $pistes;

    public function __construct(string $nom, array $pistes=[])
    {
        $this->nom = $nom;
        $this->pistes = $pistes;

        $this->nbPistes = 0;
        $this->duree = 0;

        foreach ($this->pistes as $piste) {
            $this->nbPistes++;
            $this->duree += $piste->duree;
        }

    }

    public function __set(string $at,mixed $val):void {
        if ( property_exists ($this, $at) ) {
            if ($at == 'pistes') {
                $this->$at[] = $val;
            } else if ($at == 'nbPistes' or $at == 'duree') {
                $this->$at = $val;
            } else {
                throw new NonEditablePropertyException("$at: non-editable property");
            }
        } else throw new Exception ("$at: invalid property");
    }


    public function __get(string $at)
    {
        if (property_exists ($this, $at)) return $this->$at;
        throw new InvalidPropertyNameException ("$at: invalid property name");
    }

}