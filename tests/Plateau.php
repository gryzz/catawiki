<?php

include_once __DIR__ . "/../Plateau.php";

class PlateauTest extends PHPUnit_Framework_TestCase {

    public function testIsMovePossible() {
        $plateau = new Plateau(5, 5);

        $this->assertTrue($plateau->isMovePossible(1, 1, Plateau::NORTH));
        $this->assertFalse($plateau->isMovePossible(0, 0, Plateau::WEST));
        $this->assertTrue($plateau->isMovePossible(0, 0, Plateau::EAST));
        $this->assertFalse($plateau->isMovePossible(5, 0, Plateau::SOUTH));
    }

    /**
     * @expectedException Exception
     */
    public function testIsMovePossibleException() {
        $plateau = new Plateau(5, 5);
        $plateau->isMovePossible(1, 10, Plateau::NORTH);
    }

    public function testMove() {
        $plateau = new Plateau(5, 5);

        $this->assertEquals([1, 0], $plateau->move(0, 0, Plateau::EAST));
        $this->assertEquals([0, 1], $plateau->move(0, 0, Plateau::NORTH));
        $this->assertEquals([0, 1], $plateau->move(1, 1, Plateau::WEST));
        $this->assertEquals([1, 0], $plateau->move(1, 1, Plateau::SOUTH));
    }

    /**
     * @expectedException Exception
     */
    public function testMoveException () {
        $plateau = new Plateau(5, 5);
        $plateau->move(10, 10, Plateau::NORTH);
    }

    public function testTurn() {
        $plateau = new Plateau(5, 5);

        $this->assertEquals(Plateau::NORTH, $plateau->turn(Plateau::EAST, Plateau::LEFT));
        $this->assertEquals(Plateau::WEST, $plateau->turn(Plateau::NORTH, Plateau::LEFT));
        $this->assertEquals(Plateau::SOUTH, $plateau->turn(Plateau::WEST, Plateau::LEFT));
        $this->assertEquals(Plateau::EAST, $plateau->turn(Plateau::SOUTH, Plateau::LEFT));

        $this->assertEquals(Plateau::SOUTH, $plateau->turn(Plateau::EAST, Plateau::RIGHT));
        $this->assertEquals(Plateau::EAST, $plateau->turn(Plateau::NORTH, Plateau::RIGHT));
        $this->assertEquals(Plateau::NORTH, $plateau->turn(Plateau::WEST, Plateau::RIGHT));
        $this->assertEquals(Plateau::WEST, $plateau->turn(Plateau::SOUTH, Plateau::RIGHT));

    }
}