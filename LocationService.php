<?php

class LocationService 
{

    public function parseAndSort(array $rawData): array
    {
        $leftList = [];
        $rightList = [];

        foreach ($rawData as $row) {
            $leftList[] = $row[0];
            $rightList[] = $row[1];
        }

        sort($leftList);
        sort($rightList);

        return [$leftList, $rightList];
    }
}