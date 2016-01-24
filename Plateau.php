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

    /**
     * Checks if move to direction is possible from defined coordinates;
     *
     * @param int $x
     * @param int $y
     * @param string $orientation
     * @return bool
     */
    public function isMovePossible($xCoordinate, $yCoordinate, $orientation) {
        return true;
    }



}