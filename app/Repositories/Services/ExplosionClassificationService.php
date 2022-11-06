<?php

namespace App\Repositories\Services;

use App\Models\ExplosionClassification;
use App\Repositories\ExplosionClassificationRepository;

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
