<?php

$plateauSize = [];
$roversInput = [];

$handle = fopen("input.txt", "r");
while (($line = fgets($handle)) !== false) {
    if (!$plateauSize) {
        list($plateauSize['x'], $plateauSize['y']) = explode(' ', trim($line));
    } else {
        $rover = [];
        list($rover['x'], $rover['y'], $rover['orientation']) = explode(' ', trim($line));
        $line = fgets($handle);
        $rover['instructions'] = str_split(trim($line));
        $roversInput[] = $rover;
    }
}
