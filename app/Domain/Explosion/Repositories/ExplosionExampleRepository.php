<?php

namespace App\Domain\Explosion\Repositories;

use App\Models\ExplosionClassification;
use App\Models\ExplosionExample;
use Illuminate\Database\Eloquent\Builder;

class ExplosionExampleRepository
{
    public function getExamplesByClassification(ExplosionClassification $classification)
    {
        return $this->query()
            ->where('power','<', $classification->max_power)
            ->where('power','>=', $classification->min_power)
            ->orderBy('power')
            ->get()->toArray();
    }

    private function query(): Builder
    {
        return ExplosionExample::query();
    }
}
