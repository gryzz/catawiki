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
        $plateau->isMovePossible(1, 10, 'N');
    }

    public function testMove() {
        $plateau = new Plateau(5, 5);

        $this->assertEquals([1, 0], $plateau->move(0, 0, 'E'));
        $this->assertEquals([0, 1], $plateau->move(0, 0, 'N'));
        $this->assertEquals([0, 1], $plateau->move(1, 1, 'W'));
        $this->assertEquals([1, 0], $plateau->move(1, 1, 'S'));
    }

    /**
     * @expectedException Exception
     */
    public function testMoveException () {
        $plateau = new Plateau(5, 5);
        $plateau->move(10, 10, 'N');
    }
}