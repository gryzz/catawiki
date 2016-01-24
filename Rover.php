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

    private $instructions = [];

    private $allowedActions = [Plateau::MOVE];

    private $allowedTurnDirections = [Plateau::LEFT, Plateau::RIGHT];

    public function __construct(Plateau $plateau, $xPosition, $yPosition, $orientation, $instructions) {
        $this->plateau = $plateau;
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->orientation = $orientation;
        $this->instructions = $instructions;
    }

    public function executeInstructions() {
        foreach ($this->instructions as $instruction) {
            if (in_array($instruction, $this->allowedActions)) {
                if (!$this->plateau->isMovePossible(
                    $this->xPosition,
                    $this->yPosition,
                    $this->orientation
                )) {
                    throw new Exception('Move is not possible - new position is out of the grid.');
                }
                list($newXCoordinate, $newYCoordinate) = $this->plateau->move(
                    $this->xPosition,
                    $this->yPosition,
                    $this->orientation
                );
                $this->xPosition = $newXCoordinate;
                $this->yPosition = $newYCoordinate;
            } elseif (in_array($instruction, $this->allowedTurnDirections)) {
                $this->orientation = $this->plateau->turn($this->orientation, $instruction);
            } else {
                throw new Exception('Unknown instruction.');
            }
        }
    }

    public function getInfo() {
        return sprintf("%d %d %s", $this->xPosition, $this->yPosition, $this->orientation);
    }



}