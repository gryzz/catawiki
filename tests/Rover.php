<?php

include_once __DIR__ . "/../Rover.php";
include_once __DIR__ . "/../Plateau.php";

class RoverTest extends PHPUnit_Framework_TestCase {

    public function testGetInfo() {
        $plateau = $this->getMock(
            'Plateau', [], [], '', false
        );
        $rover1 = new Rover($plateau, 1, 3, Plateau::NORTH, []);
        $this->assertEquals('1 3 N', $rover1->getInfo());

        $rover1 = new Rover($plateau, 2, 3, Plateau::NORTH, []);
        $this->assertEquals('2 3 N', $rover1->getInfo());
    }

    public function testExecuteInstructions() {
        $plateau = new Plateau(5,5);
        $rover = new Rover($plateau, 1, 2, Plateau::NORTH, ['L','M','L','M','L','M','L','M','M']);
        $rover->executeInstructions();
        $this->assertEquals('1 3 N', $rover->getInfo());


        $rover = new Rover($plateau, 3, 3, Plateau::EAST, ['M', 'M', 'R', 'M', 'M', 'R', 'M', 'R', 'R', 'M']);
        $rover->executeInstructions();
        $this->assertEquals('5 1 E', $rover->getInfo());

        $rover = new Rover($plateau, 5, 5, Plateau::SOUTH, ['M', 'M', 'M', 'M', 'M', 'R', 'M', 'M', 'M', 'M', 'M']);
        $rover->executeInstructions();
        $this->assertEquals('0 0 W', $rover->getInfo());

        $rover = new Rover($plateau, 0, 0, Plateau::EAST, ['M', 'M', 'M', 'M', 'M', 'L', 'M', 'M', 'M', 'M', 'M']);
        $rover->executeInstructions();
        $this->assertEquals('5 5 N', $rover->getInfo());

    }

    /**
     * @expectedException ImpossibleMoveException
     */
    public function testExecuteInstructionException () {
        $plateau = new Plateau(5,5);
        $rover = new Rover($plateau, 5, 5, Plateau::SOUTH, ['M', 'M', 'M', 'M', 'M', 'L', 'M', 'M', 'M', 'M', 'M']);
        $rover->executeInstructions();
    }

    /**
     * @expectedException UnknownInstructionException
     */
    public function testUnknownInstructionException() {
        $plateau = new Plateau(5,5);
        $rover = new Rover($plateau, 5, 5, Plateau::SOUTH, ['42']);
        $rover->executeInstructions();
    }
}