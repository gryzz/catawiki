<?php

include_once "Rover.php";

class Plateau {

    /**
     * @var int
     */
    private $sizeX;

    /**
     * @var int
     */
    private $sizeY;

    public function __construct($x, $y) {
        $this->sizeX = $x;
        $this->sizeY = $y;
    }

}