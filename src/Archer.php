<?php

require_once "Unit.php";

class Archer extends Unit
{
    protected int $speed = 5;

    public function __construct()
    {
        $this->categName = 'Archer';
        parent::__construct();
    }

    public function attack(): string
    {
        return "l'archer attaque !";
    }
}
