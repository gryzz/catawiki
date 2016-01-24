<?php

include_once "Plateau.php";

class Rover {

    /**
     * @var Plateau
     */
    private $plateau;

    /**
     * @var int
     */
    private $xPosition;

    /**
     * @var int
     */
    private $yPosition;

    /**
     * @var string
     */
    private $orientation;

    /**
     * Array of instructions.
     *
     * @var array
     */
    private $instructions = [];

    /**
     * @var array
     */
    private $allowedActions = [Plateau::MOVE];

    /**
     * @var array
     */
    private $allowedTurnDirections = [Plateau::LEFT, Plateau::RIGHT];

    /**
     * @param Plateau $plateau
     * @param int $xPosition
     * @param int $yPosition
     * @param int $orientation
     * @param [] $instructions
     */
    public function __construct(Plateau $plateau, $xPosition, $yPosition, $orientation, $instructions) {
        $this->plateau = $plateau;
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->orientation = $orientation;
        $this->instructions = $instructions;
    }

    /**
     * Executes instructions.
     *
     * @throws Exception
     */
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

    /**
     * Composing rover info from its data.
     *
     * @return string
     */
    public function getInfo() {
        return sprintf("%d %d %s", $this->xPosition, $this->yPosition, $this->orientation);
    }



}