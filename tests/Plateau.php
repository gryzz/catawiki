<?php

include_once __DIR__ . "/../Plateau.php";

class PlateauTest extends PHPUnit_Framework_TestCase {

    public function testIsMovePossible() {
        $plateau = new Plateau(5, 5);

        $this->assertTrue($plateau->isMovePossible(1, 1, 'N'));
        $this->assertFalse($plateau->isMovePossible(0, 0, 'W'));
        $this->assertTrue($plateau->isMovePossible(0, 0, 'E'));
        $this->assertFalse($plateau->isMovePossible(5, 0, 'S'));
    }

    /**
     * @expectedException Exception
     */
    public function testIsMovePossibleException() {
        $plateau = new Plateau(5, 5);
        $this->assertTrue($plateau->isMovePossible(1, 10, 'N'));
    }
}