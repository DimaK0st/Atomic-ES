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
    public array $examplesList = []; //TODO DIMON
    public array $additionalParameters = [ //TODO DIMON
        'diameter' => '',
        'maxLight' => '',
        'timeLit' => '',
        'mushroomHeight' => '',
        'cloudHeight' => '',
        'cloudDiameter' => '',
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
    public function setAdditionalParameters(float $diameter, float $maxLight, float $timeLit, float $mushroomHeights, float $cloudHeight, float $cloudDiameter): void
    {
        $this->additionalParameters['diameter'] = $diameter;
        $this->additionalParameters['maxLight'] = $maxLight;
        $this->additionalParameters['timeLit'] = $timeLit;
        $this->additionalParameters['mushroomHeight'] = $mushroomHeights;
        $this->additionalParameters['cloudHeight'] = $cloudHeight;
        $this->additionalParameters['cloudDiameter'] = $cloudDiameter;
    }


}
