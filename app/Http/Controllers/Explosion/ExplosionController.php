<?php

namespace App\Http\Controllers\Explosion;

use App\Actions\CalculateExplosionAction;
use App\Actions\GetDatabaseDataAction;
use App\Actions\ValidateExplosionDataAction;
use App\DTO\ExplosionDTO;
use App\Http\Resources\BombResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ExplosionController extends BaseController
{
    /**
     * @param Request $request
     * @param CalculateExplosionAction $calculateExplosionAction
     * @param GetDatabaseDataAction $getDatabaseDataAction
     * @param ValidateExplosionDataAction $validateExplosionData
     * @return BombResource|string
     * @throws UnknownProperties
     */
    public function calculateExplosion(Request $request, CalculateExplosionAction $calculateExplosionAction, GetDatabaseDataAction $getDatabaseDataAction, ValidateExplosionDataAction $validateExplosionData): BombResource|string
    {
        $explosionDTO = ExplosionDTO::fromRequestData($request);
        $validation = $validateExplosionData->run($explosionDTO);
        if ($validation != 'valid') {
            return $validation;
        }
        $bombCalcModel = $calculateExplosionAction->run($explosionDTO);

        $bombCalcModel = $getDatabaseDataAction->run($bombCalcModel); //TODO DIMON
        return BombResource::make($bombCalcModel);
    }
}


//        $examplesAction->run(ExplosionDTO::fromRequestData($request));
//        $kiloTon = $this->explosionService->calculateExplosion($request);
//        $classificationModel = $this->classificationService->getClassificationByKiloTon($kiloTon);
//        $exampleList = $this->exampleService->getExamplesByClassification($classificationModel);
