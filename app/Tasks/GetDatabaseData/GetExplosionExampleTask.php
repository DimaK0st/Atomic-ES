<?php

namespace App\Tasks\GetDatabaseData;

use App\Repositories\ExplosionExampleRepository;

class GetExplosionExampleTask
{
    public function __construct(private ExplosionExampleRepository $exampleRepository)
    {
    }

    public function run(int $minPower, int $maxPower): array
    {
        return $this->exampleRepository->getExamplesByClassification($minPower, $maxPower);
    }
}
