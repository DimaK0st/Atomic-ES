<?php

namespace App\Api\v1\Explosion\Requests;

class CalculateExplosionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'materialType'=>'string|required',
            'materialCount'=>'int|required',
            'isTemper'=>'boolean|required',
            'temperType'=>'string|required',
            'temperCount'=>'int|required',
            'termCount'=>'int|required',
            'neutronCount'=>'int|required',
        ];
    }
    /**
     * @return array
     */
    public function getMaterialType(): array
    {
        return $this->input('materialType');
    }
    /**
     * @return array
     */
    public function getMaterialCount(): array
    {
        return $this->input('materialCount');
    }
    /**
     * @return array
     */
    public function isTemper(): array
    {
        return $this->input('isTemper');
    }
    /**
     * @return array
     */
    public function getTemperType(): array
    {
        return $this->input('temperType');
    }
    /**
     * @return array
     */
    public function getTemperCount(): array
    {
        return $this->input('temperCount');
    }
    /**
     * @return array
     */
    public function getTermCount(): array
    {
        return $this->input('termCount');
    }
    /**
     * @return array
     */
    public function getNeutronCount(): array
    {
        return $this->input('neutronCount');
    }

}
