<?php

namespace App\Repositories\Services;

use App\Api\v1\Explosion\Requests\CalculateExplosionRequest;

class ExplosionService
{
    public function calculateExplosion(CalculateExplosionRequest $request){
        return 73.0;
    }
}
