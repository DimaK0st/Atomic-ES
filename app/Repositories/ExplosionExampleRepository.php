<?php

namespace App\Repositories;

use App\Models\ExplosionClassification;
use App\Models\ExplosionExample;
use Illuminate\Database\Eloquent\Builder;

class ExplosionExampleRepository
{
    public function getExamplesByClassification(int $minPower, int $maxPower): array
    {
        return $this->query()
            ->where('power','>=', $minPower)
            ->where('power','<', $maxPower)
            ->orderBy('power')
            ->get()->toArray();
    }

    private function query(): Builder
    {
        return ExplosionExample::query();
    }
}
