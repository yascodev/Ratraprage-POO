<?php

require_once 'CsvReader.php';
require_once 'LocationService.php';
require_once 'SimilarityCalculator.php';

$reader = new CsvReader();
$locationService = new LocationService();
$calculator = new SimilarityCalculator();

$rawData = $reader->read(__DIR__ . '/input.csv');

$input = $locationService->parseAndSort($rawData);

file_put_contents(__DIR__ . '/sortedInput.json', json_encode($input, JSON_PRETTY_PRINT));

$similarityScore = $calculator->calculate($input[0], $input[1]);

echo $similarityScore . PHP_EOL;
