<?php

include_once "Plateau.php";

class Rover {

    /**
     * @var Plateau
     */
    private $plateau;

    private $xPosition;

    private $yPosition;

    private $orientation;

    private $instructions;

    public function __construct(Plateau $plateau, $xPosition, $yPosition, $orientation, $instructions) {
        $this->plateau = $plateau;
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->orientation = $orientation;
        $this->instructions = $instructions;
    }

    public function executeInstructions() {

    }

    public function getInfo() {
        return sprintf("%d %d %s", 1, 3, 'N');
    }



}