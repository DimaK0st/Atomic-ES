<?php

namespace App\Actions;

use App\Constants\Constants;
use App\DTO\ExplosionDTO;
use App\Tasks\CalculateExplosion\CalculatePurityTask;

class ValidateExplosionDataAction
{

    public function __construct(private CalculatePurityTask $calculatePurityTask)
    {
    }

    public function run(ExplosionDTO $explosionDTO): string
    {
        if ($explosionDTO->coreMaterial == Constants::$CORE_MATERIAL['Plutonium']) {
            if ($explosionDTO->purity < Constants::$PLUTONIUM_MINIMAL_PURITY) {
                return 'Too bad plutonium';
            }
        }
        if ($explosionDTO->coreMaterial == Constants::$CORE_MATERIAL['Uranium']) {
            if ($explosionDTO->purity < Constants::$URANIUM_MINIMAL_PURITY) {
                return 'Too bad uranium';
            }
            if ($explosionDTO->amountMaterial < $this->calculatePurityTask->run($explosionDTO->coreMaterial, $explosionDTO->temperMaterial, $explosionDTO->purity)) {
                return 'Too little material to kaboom';
            }
        }
        if ($explosionDTO->coreMaterial != Constants::$CORE_MATERIAL['Uranium'] && $explosionDTO->coreMaterial != Constants::$CORE_MATERIAL['Plutonium']) {
            return 'Wrong material';
        }
        return 'valid';
    }
}
