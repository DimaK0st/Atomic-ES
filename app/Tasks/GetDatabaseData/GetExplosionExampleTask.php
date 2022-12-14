<?php

namespace App\Tasks\GetDatabaseData;

use App\Repositories\ExplosionExampleRepository;

class GetExplosionExampleTask
{
    public function __construct(private ExplosionExampleRepository $exampleRepository)
    {
    }

    public function run(float $yield): array
    {
        $examplesList = $this->exampleRepository->getExamplesByYield($yield);

        foreach ($examplesList as $key=>$item){
            $examplesList[$key]['url'] = asset('images/' . $item['url']);
        }

        return $examplesList;
    }
}
