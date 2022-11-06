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
        return [
            'yield' => $this->yield,
            'materialReacted' => $this->materialReacted,
            'suggestions' => $this->suggestions,
            'explanations' => $this->explanations,
            'examplesList' => $this->examplesList,
            'additionalParameters' => $this->additionalParameters,
        ];
    }
}
