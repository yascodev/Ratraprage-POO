<?php

class App 
{
    private $reader;
    private $locationService;
    private $calculator;
    private $exporter;

    public function __construct() {
        $this->reader = new CsvReader();
        $this->locationService = new LocationService();
        $this->calculator = new SimilarityCalculator();
        $this->exporter = new JsonExporter();
    }

    public function run() {
        try {
            
            $rawData = $this->reader->read(__DIR__ . '/input.csv');
            
            
            $lists = $this->locationService->parseAndSort($rawData);
            
            
            $this->exporter->export(__DIR__ . '/sortedInput.json', $lists);
            
            
            $score = $this->calculator->calculate($lists[0], $lists[1]);
            
            echo $score . PHP_EOL;
            
        } catch (Exception $e) {
            echo "Erreur lors de l'exécution : " . $e->getMessage() . PHP_EOL;
        }
    }
}