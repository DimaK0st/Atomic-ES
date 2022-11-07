<?php

namespace App\Tasks\CalculateExplosion;

use App\Constants\Constants;
use App\Models\BombCalcModel;

class CreateSuggestionsTask
{

    public function __construct(private CalculatePurityTask $calculatePurityTask, private CalculatePowerTask $calculatePowerTask)
    {
    }

    public function run(BombCalcModel $bombCalcModel): string
    {
        $percentageExploded = number_format((($bombCalcModel->materialReacted / 1000) / $bombCalcModel->amountMaterial), 5) * 100;
        $word1 = $bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Uranium'] ? 'урану' : 'плутонію';
        $word2 = $bombCalcModel->coreMaterial == Constants::$CORE_MATERIAL['Uranium'] ? 'уранову' : 'плутонієву';

        $suggestions = 'Як покращити ККД своєї бомби?<br>';

        if ($percentageExploded < 80) {
            $suggestions .= 'Попершу, у вашій бомбі зреагувало ';
            if ($percentageExploded < 30 && $percentageExploded > 10) {
                $suggestions .= 'лише ';
            }
            if ($percentageExploded < 10) {
                $suggestions .= 'тільки ';
            }
            $suggestions .= $percentageExploded . '% матеріалу ділення. ';
            if ($percentageExploded < 10 && $bombCalcModel->temperMaterial == Constants::$TEMPER_MATERIAL['None']) {
                $minimalMass = max($this->calculatePurityTask->run($bombCalcModel->coreMaterial, Constants::$TEMPER_MATERIAL['Beryllium'], $bombCalcModel->purity) * 1000, $bombCalcModel->materialReacted);
                $suggestions .= 'Система радить Вам використовувати темпер з Урану-235 чи краще Берілію<br>Зрибивши це ви використаєте на ' . number_format((1 - $minimalMass / ($bombCalcModel->amountMaterial * 1000)) * 100, 4) . '% та зменшете массу речовини (до ';
                $suggestions .= $minimalMass > 1000 ? number_format(($minimalMass / 1000), 3) . ' кг )<br>' : (number_format($minimalMass, 3) . ' грам )<br>');

            }

            if ($percentageExploded < 1) {
                $tmpBombCalcModel = clone $bombCalcModel;
                $tmpBombCalcModel->numberOfNeutrons *= 1000;
                $tmpBombCalcModel = $this->calculatePowerTask->run($tmpBombCalcModel);
                $suggestions .= 'Система також радить Вам використовувати більше нейтроних випромінювачей, тому що саме це стало основною проблемою у вашій ситуації<br>Якщо ви збільшете це число у 1000 разів, то вибух вже матиме потужність у ' . number_format($tmpBombCalcModel->yield, 3) . ' кт та таким чином прореагує вже ';
                $suggestions .= $tmpBombCalcModel->materialReacted > 1000 ? ($tmpBombCalcModel->materialReacted / 1000) . ' кг ' : (number_format($tmpBombCalcModel->materialReacted, 2) . ' грам ');
                $suggestions .= $word1 . '<br>';
            }

            if ($percentageExploded > 50) {
                if ($bombCalcModel->temperMaterial == Constants::$TEMPER_MATERIAL['None']) {
                    $minimalMass = max($this->calculatePurityTask->run($bombCalcModel->coreMaterial, Constants::$TEMPER_MATERIAL['Beryllium'], $bombCalcModel->purity) * 1000, $bombCalcModel->materialReacted);
                    $suggestions .= 'Система радить Вам використовувати темпер з Урану-235 чи краще Берілію<br>Зробивши це ви використаєте на ' . number_format((1 - ($minimalMass / $bombCalcModel->amountMaterial)) * 100, 4) . '% та зменшете массу речовини (до ' . number_format($minimalMass, 3) . ' кг)<br>';
                }

                $suggestions .= 'Це вже не погано але ви можете збільшити кількість нейтронів на один-два порядки, щоб пришвидчити реакцію';
            }
        }
        if ($percentageExploded > 80) {
            $suggestions .= 'Ви вже маєте досить потужну та ефективну ' . $word2 . ' бомбу, щоб використати її за призначенням. Щасти)';

        }

        return $suggestions;
    }

}
