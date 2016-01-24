<?php

include_once __DIR__ . "/../Rover.php";

class RoverTest extends PHPUnit_Framework_TestCase {

    public function testGetInfo() {
        $plateau = $this->getMock(
            'Plateau', [], [], '', false
        );
        $rover = new Rover($plateau, 1, 3, 'N', 'LMLM');
        $this->assertEquals('1 3 N', $rover->getInfo());

    }
}