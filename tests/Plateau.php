<?php

include_once __DIR__ . "/../Plateau.php";

class PlateauTest extends PHPUnit_Framework_TestCase {

    public function testIsMovePossible() {
        $plateau = new Plateau(5, 5);

        $this->assertTrue($plateau->isMovePossible(1,1, 'N'));
    }
}