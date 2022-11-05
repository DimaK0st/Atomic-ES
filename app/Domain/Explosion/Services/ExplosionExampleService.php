<?php

namespace App\Domain\Explosion\Services;

use App\Domain\Explosion\Repositories\ExplosionExampleRepository;
use App\Models\ExplosionClassification;

class ExplosionExampleService
{

    public function __construct(private ExplosionExampleRepository $exampleRepository)
    {
    }

    public function getExamplesByClassification(ExplosionClassification $classification)
    {
        return $this->exampleRepository->getExamplesByClassification($classification);
    }

}
