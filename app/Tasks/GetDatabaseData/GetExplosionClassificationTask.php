<?php

namespace App\Tasks\GetDatabaseData;

use App\Models\ExplosionClassification;
use App\Repositories\ExplosionClassificationRepository;

class GetExplosionClassificationTask
{
    public function __construct(private ExplosionClassificationRepository $classificationRepository)
    {
    }

    public function run(float $kiloTon): ExplosionClassification|null
    {
        return $this->classificationRepository->getClassificationByKiloTon($kiloTon);
    }
}
