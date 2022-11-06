<?php

namespace App\Actions;

use App\Models\BombCalcModel;

class GetDatabaseDataAction
{

    public function run(BombCalcModel $bombCalcModel)
    {


        return $bombCalcModel;
    }

}
