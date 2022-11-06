<?php

namespace App\Actions;

use App\DTO\ExplosionDTO;
use App\Models\BombCalcModel;
use App\Tasks\CalculateExplosion\CalculatePowerTask;
use App\Tasks\CalculateExplosion\CreateExplanationTask;
use App\Tasks\CalculateExplosion\CreateSuggestionsTask;

class CalculateExplosionAction
{


    public function __construct(private CalculatePowerTask $calculatePowerTask, private CreateExplanationTask $createExplanationTask, private CreateSuggestionsTask $createSuggestionsTask)
    {
    }

    public function run(ExplosionDTO $explosionDTO): BombCalcModel
    {
        $bombCalcModel = $this->calculatePowerTask->run(new BombCalcModel($explosionDTO));
        $bombCalcModel->suggestions = $this->createSuggestionsTask->run($bombCalcModel);
        $bombCalcModel->explanations = $this->createExplanationTask->run($bombCalcModel);

        return $bombCalcModel;
    }
}
