<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BombResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     *///Todo DIMON Проверить и доделать ресурс, если оно не будет работать
    public function toArray($request): array
    {
        $power = number_format($this->yield, 2);
        if ($power<0.1){
            $power = 'Выбуху не було';
        }
        return [
            'yield' => $power,
            'materialReacted' => number_format($this->materialReacted, 2),
            'explanations' => $this->explanations,
            'suggestions' => $this->suggestions,
            'examplesList' => $this->examplesList,
            'additionalParameters' => $this->additionalParameters,
        ];
    }
}
