<?php

require_once 'CsvReader.php';
require_once 'LocationService.php';
require_once 'SimilarityCalculator.php';
require_once 'JsonExporter.php';

$reader = new CsvReader();
$locationService = new LocationService();
$calculator = new SimilarityCalculator();
$exporter = new JsonExporter(); 

$rawData = $reader->read(__DIR__ . '/input.csv');
$input = $locationService->parseAndSort($rawData);

$exporter->export(__DIR__ . '/sortedInput.json', $input);

$similarityScore = $calculator->calculate($input[0], $input[1]);

echo $similarityScore . PHP_EOL;
