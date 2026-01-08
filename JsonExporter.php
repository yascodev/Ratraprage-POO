<?php

class JsonExporter 
{

    public function export(string $filename, array $data): void
    {
        $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
        
        if ($jsonContent === false) {
            throw new Exception("Erreur lors de l'encodage JSON.");
        }

        file_put_contents($filename, $jsonContent);
    }
}