<?php

namespace App\Domain\Explosion\Services;

use App\Domain\Explosion\Repositories\ExplosionClassificationRepository;
use App\Models\ExplosionClassification;
use Illuminate\Database\Eloquent\Model;

class ExplosionClassificationService
{
    public function __construct(private ExplosionClassificationRepository $classificationRepository)
    {
    }

    /**
     * @param float $kiloTon
     * @return ExplosionClassification|null
     */
    public function getClassificationByKiloTon(float $kiloTon)
    {
        return $this->classificationRepository->getClassificationByKiloTon($kiloTon);
    }

}
