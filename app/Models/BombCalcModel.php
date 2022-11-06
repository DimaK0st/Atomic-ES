<?php

namespace App\Models;

use App\DTO\ExplosionDTO;

class BombCalcModel
{
    public int $purity;
    public float $amountMaterial;
    public string $coreMaterial;
    public string $temperMaterial;
    public int $numberOfNeutrons;
    public float $yield;
    public float $materialReacted;
    public string $suggestions;
    public string $explanations;
    public array $examplesList = [];
    public array $additionalParameters = [
        'diameter' => '',
        'maxLight' => '',
        'timeLit' => '',
        'mushroomHeight' => '',
        'cloudHeight' => '',
        'cloudDiameter' => '',
        'fireImg' => '',
        'nuclearImg' => '',
    ];

    /**
     * @param ExplosionDTO $explosionDTO
     */
    public function __construct(ExplosionDTO $explosionDTO)
    {
        $this->purity = $explosionDTO->purity;
        $this->amountMaterial = $explosionDTO->amountMaterial;
        $this->coreMaterial = $explosionDTO->coreMaterial;
        $this->temperMaterial = $explosionDTO->temperMaterial;
        $this->numberOfNeutrons = $explosionDTO->numberOfNeutrons;
    }

    /**
     * @param float $diameter
     * @param float $maxLight
     * @param float $timeLit
     * @param float $mushroomHeights
     * @param float $cloudHeight
     * @param float $cloudDiameter
     * @return void
     *///TODO DIMON
//    public function setAdditionalParameters(float $diameter, float $maxLight, float $timeLit, float $mushroomHeights, float $cloudHeight, float $cloudDiameter): void
    public function setAdditionalParameters(ExplosionClassification $model): void
    {
        $this->additionalParameters['diameter'] = $model->cloud_diameter;
        $this->additionalParameters['maxLight'] = $model->glow_max;
        $this->additionalParameters['timeLit'] = $model->glow_time;
        $this->additionalParameters['mushroomHeight'] = $model->mushroom_height;
        $this->additionalParameters['cloudHeight'] = $model->cloud_height;
        $this->additionalParameters['cloudDiameter'] = $model->cloud_diameter;
        $this->additionalParameters['fireImg'] = asset('images/' . $model->fire_cloud_img);
        $this->additionalParameters['nuclearImg'] = asset('images/' . $model->nuclear_cloud_img);
    }


}
