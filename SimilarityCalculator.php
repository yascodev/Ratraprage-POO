<?php

class SimilarityCalculator 
{

    public function calculate(array $leftList, array $rightList): int
    {
        $listWithMultiplier = [];

        foreach ($leftList as $value) {
            $listWithMultiplier[$value] = 0;
        }

        foreach ($rightList as $value) {
            if (array_key_exists($value, $listWithMultiplier)) {
                $listWithMultiplier[$value]++;
            }
        }

        $similarityScore = 0;

        foreach ($listWithMultiplier as $value => $multiplier) {
            $similarityScore += $value * $multiplier;
        }

        return $similarityScore;
    }
}