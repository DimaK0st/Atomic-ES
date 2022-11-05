<?php

namespace App\Domain\Explosion\Repositories;

use App\Models\ExplosionClassification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ExplosionClassificationRepository
{
    /**
     * @param float $kiloTon
     * @return ExplosionClassification|null
     */
    public function getClassificationByKiloTon(float $kiloTon): ?ExplosionClassification
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
