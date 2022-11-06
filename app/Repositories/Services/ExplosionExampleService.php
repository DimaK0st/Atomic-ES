<?php

namespace App\Repositories\Services;

use App\Models\ExplosionClassification;
use App\Repositories\ExplosionExampleRepository;

class ExplosionExampleService
{

    public function __construct(private readonly ExplosionExampleRepository $exampleRepository)
    {
    }

    public function getExamplesByClassification(ExplosionClassification $classification)
    {
        return $this->exampleRepository->getExamplesByClassification($classification);
    }

}
