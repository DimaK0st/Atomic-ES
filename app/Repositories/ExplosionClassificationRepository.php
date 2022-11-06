<?php

namespace App\Repositories;

use App\Models\ExplosionClassification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ExplosionClassificationRepository
{
    /**
     * @param float $kiloTon
     * @return object|Builder|Model
     */
    public function getClassificationByKiloTon(float $kiloTon)
    {
        return $this->query()
            ->where('min_power','<', $kiloTon)
            ->orderBy('min_power','desc')
            ->first();
    }

    private function query(): Builder
    {
        return ExplosionClassification::query();
    }
}
