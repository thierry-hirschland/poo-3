<?php

require_once "Unit.php";

class Soldier extends Unit
{
    protected int $speed = 2;

    public function __construct()
    {
        $this->categName = 'Soldier';
        parent::__construct();
    }

    public function attack(): string
    {
        return "Le soldat attaque !";
    }
}
