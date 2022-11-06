<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;

class CalculatePurityTask
{

    public function run(string $coreMaterial, string $temperMaterial, int $purity): float
    {
        $minimalRequiredMass = 0;
        if ($coreMaterial == Constants::$CORE_MATERIAL['Uranium']) {
            switch ($temperMaterial) {
                case Constants::$TEMPER_MATERIAL['None']: //y=−0.0034x3+0.7971x2−63.6994x+1782.0124
//                    $minimalRequiredMass = (-0.0034 * $purity * $purity * $purity) + (0.7971 * $purity * $purity) - (63.6994 * $purity) + 1782.0124;
                    $minimalRequiredMass = 184384.0120 * pow($purity, -1.8056);
                    break;
                case Constants::$TEMPER_MATERIAL['Uranium']: //y=−0.0018x3+0.4203x2−32.5153x+866.7000
//                    $minimalRequiredMass = (-0.0018 * $purity * $purity * $purity) + (0.4203 * $purity * $purity) - (32.5153 * $purity) + 866.7000;
                    $minimalRequiredMass = 120904.9058 * pow($purity, -1.9287);
                    break;
                case Constants::$TEMPER_MATERIAL['Beryllium']: //y=−0.0011x3+0.2691x2−21.0221x+566.9855
//                    $minimalRequiredMass = (-0.0011 * $purity * $purity * $purity) + (0.2691 * $purity * $purity) - (21.0221 * $purity) + 566.9855;
                    $minimalRequiredMass = 62032.284 * pow($purity, -1.8474);
                    break;
            }
        }
        if ($coreMaterial == Constants::$CORE_MATERIAL['Plutonium']) {
            if ($temperMaterial == Constants::$TEMPER_MATERIAL['None']) {
                $minimalRequiredMass = 10;
            } else {
                $minimalRequiredMass = 4.5;
            }
        }
        return $minimalRequiredMass;
    }

}
