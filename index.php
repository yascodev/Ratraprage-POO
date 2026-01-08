<?php
require_once 'CsvReader.php';
require_once 'LocationService.php';
require_once 'SimilarityCalculator.php';
require_once 'JsonExporter.php';
require_once 'App.php';

$app = new App();
$app->run();
