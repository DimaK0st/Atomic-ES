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
        if ($bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Uranium']) {
            $word1 = 'уранова';
            $word2 = 'урану';
        } else {
            $word1 = 'плутонієва';
            $word2 = 'плутонію';
        }
        $percentageExploded = (number_format((($bombCalcModel->materialReacted / 1000) / $bombCalcModel->amountMaterial), 5)) * 100;

        $explanation = 'Зараз система поясне, як саме і чому спрацювала ваша ' . $word1 . ' бомба методу ділення<br>';
        $explanation .= 'Ваша збірка містить ' . $bombCalcModel->amountMaterial . ' кг ' . $word2 . ' з яких зреагувало';
        $explanation .= $percentageExploded < 0.8 ? ' тільки ' : ' ';
        $explanation .= $bombCalcModel->materialReacted > 1000 ? ($bombCalcModel->materialReacted / 1000) . ' кг матеріалу<br>' : (number_format($bombCalcModel->materialReacted, 2) . ' грам матеріалу<br>');
        $explanation .= 'Це сталося через те, що на початку процессу вибуху нейронний випромінювач активував ' . $bombCalcModel->numberOfNeutrons . ' атомів ' . $word2 . '<br>';
        $explanation .= 'Таким чином, вибухнуло ' . $percentageExploded . '% матеріалу, що еквівалентно ' . number_format($bombCalcModel->yield, 3) . ' кілотонні<br>';
//        if ((($bombCalcModel->materialReacted / 1000) / $bombCalcModel->amountMaterial) < 0.2) {
//            $explanation .= 'Ви можете краще';
//        }

        return $explanation;
    }
}
