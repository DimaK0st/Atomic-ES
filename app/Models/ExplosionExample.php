<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $operation
 * @property string $code_name
 * @property string $device
 * @property string $country
 * @property string $test_site
 * @property string $date
 * @property string $test_type
 * @property float $power
 * @property string $url
 */
class ExplosionExample extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'operation',
        'code_name',
        'device',
        'country',
        'test_site',
        'power',
        'url',
    ];
}
