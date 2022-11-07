<?php

namespace App\Repositories;

use App\Models\ExplosionClassification;
use App\Models\ExplosionExample;
use Illuminate\Database\Eloquent\Builder;

class ExplosionExampleRepository
{
    private static $YIELD_RANGE = 0.3;
    private static $YIELD_RANGE_ABS = 10;

    public function getExamplesByClassification(int $minPower, int $maxPower): array
    {
        return $this->query()
            ->where('power', '>=', $minPower)
            ->where('power', '<', $maxPower)
            ->orderBy('power')
            ->get()->toArray();
    }

    //TODO
    public function getExamplesByYield(float $yield)
    {
        $left_power = min(($yield - ($yield * ExplosionExampleRepository::$YIELD_RANGE)), (($yield - ExplosionExampleRepository::$YIELD_RANGE_ABS) < 0 ? 0 : $yield - ExplosionExampleRepository::$YIELD_RANGE_ABS));
        $right_power = max(($yield + ($yield * ExplosionExampleRepository::$YIELD_RANGE)), ($yield + ExplosionExampleRepository::$YIELD_RANGE_ABS));

        return $this->query()
            ->where('power', '<', $right_power)
            ->where('power', '>=', $left_power)
            ->orderBy('power')
            ->get()->toArray();
    }

    private function query(): Builder
    {
        return ExplosionExample::query();
    }
}
