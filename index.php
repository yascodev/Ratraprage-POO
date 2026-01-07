<?php

require_once 'CsvReader.php';
require_once 'LocationService.php';

$reader = new CsvReader();
$inputData = $reader->read(__DIR__ . '/input.csv');

$localisationLeftList = [];
$localisationRightList = [];

$locationService = new LocationService();
$input = $locationService->parseAndSort($inputData);

file_put_contents(__DIR__ . '/sortedInput.json', json_encode($input, JSON_PRETTY_PRINT));

$greatestList = $input[0];

for($i = 1; $i < count($input); $i++) {
    if(count($input[$i]) > count($greatestList)) {
        $greatestList = $input[$i];
    }
}

$listWithMultiplier = [];

for($i = 0; $i < count($input[0]); $i++) {
    $listWithMultiplier[$input[0][$i]] = 0;
}

for($i = 0; $i < count($input[1]); $i++) {
    $value  = $input[1][$i];
    if(array_key_exists($value, $listWithMultiplier)) {
        $listWithMultiplier[$value]++;
    }
}

$similarityScore = 0;

foreach($listWithMultiplier as $value=>$multiplier) {
    $similarityScore += $value * $multiplier;
}

echo $similarityScore . PHP_EOL;
