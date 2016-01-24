<?php

include_once __DIR__ . "/Plateau.php";
include_once __DIR__ . "/Rover.php";

$plateauSize = [];
$roversInputs = [];

$handle = fopen("input.txt", "r");
while (($line = fgets($handle)) !== false) {
    if (!$plateauSize) {
        list($plateauSize['x'], $plateauSize['y']) = explode(' ', trim($line));
    } else {
        $roverInput = [];
        list($roverInput['x'], $roverInput['y'], $roverInput['orientation']) = explode(' ', trim($line));
        $line = fgets($handle);
        $roverInput['instructions'] = str_split(trim($line));
        $roversInputs[] = $roverInput;
    }
}

foreach ($roversInputs as $roverInput) {
    $rover = new Rover(
        new Plateau($plateauSize['x'], $plateauSize['y']),
        $roverInput['x'],
        $roverInput['y'],
        $roverInput['orientation'],
        $roverInput['instructions']
    );
    try {
        $rover->executeInstructions();
        print $rover->getInfo() . "\n";
    } catch (Exception $e) {
        print "Error occurred: " . $e->getMessage();
    }
}
