<?php

namespace App\Repositories;

use App\Models\ExplosionClassification;
use App\Models\ExplosionExample;
use Illuminate\Database\Eloquent\Builder;

class ExplosionExampleRepository
{
    private static $YIELD_RANGE = 10;

    public function getExamplesByClassification(int $minPower, int $maxPower): array
    {
        return $this->query()
            ->where('power','>=', $minPower)
            ->where('power','<', $maxPower)
            ->orderBy('power')
            ->get()->toArray();
    }

    //TODO
    public function getExamplesByYield(int $yeild)
    {
        $left_power = max($yeild - ExplosionExampleRepository::$YIELD_RANGE, 0);
        $right_power = $yeild + ExplosionExampleRepository::$YIELD_RANGE;

        return $this->query()
            ->where('power','<', $right_power)
            ->where('power','>=', $left_power)
            ->orderBy('power')
            ->get()->toArray();
    }

    private function query(): Builder
    {
        return ExplosionExample::query();
    }
}
