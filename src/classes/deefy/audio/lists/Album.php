<?php

namespace iutnc\deefy\audio\lists;

use Exception;
use iutnc\deefy\exception\NonEditablePropertyException;

class Album extends AudioList
{

    private string $artiste;

    private string $date;

    public function __construct(string $nom, array $pistes)
    {
        parent::__construct($nom, $pistes);
    }

    public function __set(string $at,mixed $val):void {
        if ( property_exists ($this, $at) ) {
            if ($at == 'date' or $at == 'artiste') {
                $this->$at = $val;
            } else {
                throw new NonEditablePropertyException("$at: non-editable property");

            }
        } else throw new Exception ("$at: invalid property");
    }

}