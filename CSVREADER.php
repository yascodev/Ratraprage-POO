<?php

class CsvReader 
{

    public function read(string $filename): array
    {
        $data = [];
        
        if (!file_exists($filename)) {
            throw new Exception("Le fichier $filename est introuvable.");
        }

        $handle = fopen($filename, 'r');
        
        while (($row = fgetcsv($handle, 1000, ',', '"', '\\')) !== false) {
            $data[] = $row;
        }
        
        fclose($handle);
        return $data;
    }
}