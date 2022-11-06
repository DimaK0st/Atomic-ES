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
        $examplesList = $this->exampleRepository->getExamplesByClassification($minPower, $maxPower);

        foreach ($examplesList as $key=>$item){
            $examplesList[$key]['url'] = asset('images/' . $item['url']);
        }

        return $examplesList;
    }
}
