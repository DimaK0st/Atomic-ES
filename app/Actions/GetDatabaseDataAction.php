<?php

namespace App\Actions;

use App\Models\BombCalcModel;
use App\Tasks\GetDatabaseData\GetExplosionClassificationTask;
use App\Tasks\GetDatabaseData\GetExplosionExampleTask;

class GetDatabaseDataAction
{
    public function __construct(private GetExplosionClassificationTask $explosionClassificationTask,
                                private GetExplosionExampleTask        $explosionExampleTask)
    {
    }

    public function run(BombCalcModel $bombCalcModel)
    {
        if (!$explosionClassification = $this->explosionClassificationTask->run($bombCalcModel->yield)) {
            return null;
        }

        $bombCalcModel->setAdditionalParameters($explosionClassification);
        $bombCalcModel->examplesList = $this->explosionExampleTask->run($bombCalcModel->yield);

        return $bombCalcModel;
    }
}
