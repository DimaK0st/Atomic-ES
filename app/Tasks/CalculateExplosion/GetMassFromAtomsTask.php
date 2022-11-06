<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;

class GetMassFromAtomsTask
{

    public function run(int $atomsAmount, string $coreMaterial): float|int
    {
        $atomicMass = $coreMaterial == Constants::$CORE_MATERIAL['Uranium'] ? Constants::$URANIUM_ATOMIC_MASS : Constants::$PLUTONIUM_ATOMIC_MASS;
        $mol = $atomsAmount / Constants::$AVOGADRO;
        return $mol * $atomicMass;
    }

}
