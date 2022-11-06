<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;

class CalculatePurityTask
{

    public function run(string $coreMaterial, string $temperMaterial, int $purity): float
    {
        $minimalRequiredMass = '';
        if ($coreMaterial == Constants::$CORE_MATERIAL['Uranium']) {
            switch ($temperMaterial) {
                case Constants::$TEMPER_MATERIAL['Node']:
                    $minimalRequiredMass = -(0.0034 * $purity * $purity * $purity) + (0.7971 * $purity * $purity) - (63.6994 * $purity) + 1782.0124;
                    break;
                case Constants::$TEMPER_MATERIAL['Uranium']:
                    $minimalRequiredMass = -(0.0018 * $purity * $purity * $purity) + (0.4203 * $purity * $purity) - (32.5153 * $purity) + 866.7000;
                    break;
                case Constants::$TEMPER_MATERIAL['Beryllium']:
                    $minimalRequiredMass = -(0.0011 * $purity * $purity * $purity) + (0.2691 * $purity * $purity) - (21.0221 * $purity) + 566.9855;
                    break;
            }
        }
        if ($coreMaterial == Constants::$CORE_MATERIAL['Plutonium']) {
            if ($temperMaterial == Constants::$TEMPER_MATERIAL['Node']) {
                $minimalRequiredMass = 10;
            } else {
                $minimalRequiredMass = 4.5;
            }
        }
        return $minimalRequiredMass;
    }

}
