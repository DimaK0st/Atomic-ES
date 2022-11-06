<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;
use App\Models\BombCalcModel;

class CreateExplanationTask
{

    /**
     * @param BombCalcModel $bombCalcModel
     * @return string
     */
    public function run(BombCalcModel $bombCalcModel)
    {
        $explanation = 'Зараз система поясне, як саме і чому спрацювала ваша ' . $bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Uranium'] ? 'уранова' : 'плутонієва' . ' бомба методу ділення' . '\n';


        return $explanation;
    }
}
