<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;
use App\Models\BombCalcModel;

class CalculatePowerTask
{


    public function __construct(private GetMassFromAtomsTask $getMassFromAtomsTask)
    {
    }

    public function run(BombCalcModel $bombCalcModel): BombCalcModel
    {
        $progressionConstant = '';
        $generationTime = '';
        $numberOfNeutrons = $bombCalcModel->numberOfNeutrons;
        $timeSpent = 0;
        $atomsAmount = 0;

        if ($bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Uranium']) {
            $progressionConstant = Constants::$URANIUM_PROGRESSION_KOEF;
            $generationTime = Constants::$URANIUM_GENERATION_TIME;
        }
        if ($bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Plutonium']) {
            $progressionConstant = Constants::$PLUTONIUM_PROGRESSION_KOEF;
            $generationTime = Constants::$PLUTONIUM_GENERATION_TIME;
        }

        while ($timeSpent < Constants::$CORE_STABILITY_THRESHOLD) {
            $atomsAmount += $numberOfNeutrons;
            $numberOfNeutrons *= $progressionConstant;
            $timeSpent += $generationTime;
        }

        $bombCalcModel->materialReacted = $this->getMassFromAtomsTask->run((int)$atomsAmount, $bombCalcModel->coreMaterial);
        $bombCalcModel->yield = $bombCalcModel->materialReacted * Constants::$ONE_GRAM_POWER;
        return $bombCalcModel;
    }
}
