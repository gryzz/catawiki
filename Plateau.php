<?php

include_once "Rover.php";

class Plateau {

    const NORTH = 'N';
    const SOUTH = 'S';
    const WEST = 'W';
    const EAST = 'E';
    const COORDINATE_Y = 'y';
    const COORDINATE_X = 'x';

    /**
     * @var int
     */
    private $sizeX;

    /**
     * @var int
     */
    private $sizeY;

    private $movingMap = [
        self::NORTH => [
            'coordinate' => self::COORDINATE_Y,
            'alteration' => 1
        ],
        self::SOUTH => [
            'coordinate' => self::COORDINATE_Y,
            'alteration' => -1
        ],
        self::EAST => [
            'coordinate' => self::COORDINATE_X,
            'alteration' => 1
        ],
        self::WEST => [
            'coordinate' => self::COORDINATE_X,
            'alteration' => -1
        ],

    ];

    public function __construct($x, $y) {
        $this->sizeX = $x;
        $this->sizeY = $y;
    }

    /**
     * Checks if move to direction is possible from defined coordinates;
     *
     * @throws Exception
     * @param int $xCoordinate
     * @param int $yCoordinate
     * @param string $orientation
     * @return bool
     */
    public function isMovePossible($xCoordinate, $yCoordinate, $orientation) {
        list($newXCoordinate, $newYCoordinate) = $this->_alterCoordinates($xCoordinate, $yCoordinate, $orientation);
        if ($newXCoordinate > $this->sizeX || $newXCoordinate < 0) {
            return false;
        }
        if ($newYCoordinate > $this->sizeY || $newYCoordinate < 0) {
            return false;
        }
        return true;
    }

    /**
     * Execute move on the plateau grid.
     *
     * @throws Exception
     * @param int $xCoordinate
     * @param int $yCoordinate
     * @param string $orientation
     * @return array
     */
    public function move($xCoordinate, $yCoordinate, $orientation) {
        return $this->_alterCoordinates($xCoordinate, $yCoordinate, $orientation);
    }

    private function _alterCoordinates($xCoordinate, $yCoordinate, $orientation) {
        if ($xCoordinate > $this->sizeX || $xCoordinate < 0 || $yCoordinate > $this->sizeY || $yCoordinate < 0) {
            throw new Exception('Coordinates are out of range.');
        }
        $alteration = $this->movingMap[$orientation];
        if ($alteration['coordinate'] == self::COORDINATE_X) {
            $xCoordinate = $xCoordinate + $alteration['alteration'];
        } else {
            $yCoordinate = $yCoordinate + $alteration['alteration'];
        }

        return [$xCoordinate, $yCoordinate];
    }


}