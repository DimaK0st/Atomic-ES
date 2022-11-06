<?php

namespace App\DTO;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ExplosionDTO extends DataTransferObject
{
    public int $purity;
    public float $amountMaterial; //in kg
    public string $coreMaterial;
    public string $temperMaterial;
    public int $numberOfNeutrons;

    /**
     * @param Request $request
     * @return static
     * @throws UnknownProperties
     */
    public static function fromRequestData(Request $request): self
    {
        return new self([
                'purity' => (int)$request->get('purity'),
                'amountMaterial' => (float)$request->get('amountMaterial'),
                'coreMaterial' => (string)$request->get('coreMaterial'),
                'temperMaterial' => (string)$request->get('temperMaterial'),
                'numberOfNeutrons' => (int)$request->get('numberOfNeutrons')
            ]
        );
    }

}
