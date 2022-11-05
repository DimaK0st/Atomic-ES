<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $min_power
 * @property integer $max_power
 * @property string $fire_diameter
 * @property string $glow_max
 * @property string $glow_time
 * @property string $mushroom_height
 * @property string $cloud_height
 * @property string $cloud_diameter
 * @property string $fire_cloud_img
 * @property string $nuclear_cloud_img
 */
class ExplosionClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'min_power',
        'max_power',
        'fire_diameter',
        'glow_max',
        'glow_time',
        'mushroom_height',
        'cloud_height',
        'cloud_diameter',
        'fire_cloud_img',
        'nuclear_cloud_img',
    ];

}
