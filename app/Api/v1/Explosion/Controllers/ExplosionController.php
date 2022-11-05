<?php

namespace App\Api\v1\Explosion\Controllers;

use App\Api\v1\Explosion\Requests\CalculateExplosionRequest;
use App\Domain\Explosion\Services\ExplosionClassificationService;
use App\Domain\Explosion\Services\ExplosionExampleService;
use App\Domain\Explosion\Services\ExplosionService;
use Illuminate\Routing\Controller as BaseController;

class ExplosionController extends BaseController
{

    public function __construct(
        private ExplosionService               $explosionService,
        private ExplosionClassificationService $classificationService,
        private ExplosionExampleService        $exampleService
    )
    {
    }

    public function calculateExplosion(CalculateExplosionRequest $request)
    {
        $kiloTon = $this->explosionService->calculateExplosion($request);
        $classificationModel = $this->classificationService->getClassificationByKiloTon($kiloTon);
        $exampleList = $this->exampleService->getExamplesByClassification($classificationModel);

        return [
            'classification' => $classificationModel,
            'exampleList' => $exampleList,
        ];
    }
}
