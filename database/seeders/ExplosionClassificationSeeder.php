<?php

namespace Database\Seeders;

use App\Models\ExplosionClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExplosionClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $explosionClassification = [
            [
                'min_power'         => 0,
                'max_power'         => 1,
                'fire_diameter'     => '50—200 м',
                'glow_max'          => 'до 0,03 сек',
                'glow_time'         => '0,2 сек',
                'mushroom_height'   => 'менше 3,5 км',
                'cloud_height'      => 'менше 1,3 км',
                'cloud_diameter'    => 'менше 2 км',
                'fire_cloud_img'    => '1_1.png',
                'nuclear_cloud_img' => '2_1.png',
            ],
            [
                'min_power'         => 1,
                'max_power'         => 10,
                'fire_diameter'     => '200—500 м',
                'glow_max'          => '0,03—0,1 сек',
                'glow_time'         => '1—2 сек',
                'mushroom_height'   => '3,5—7 км',
                'cloud_height'      => '1,3—2 км',
                'cloud_diameter'    => '2—4 км',
                'fire_cloud_img'    => '1_2.png',
                'nuclear_cloud_img' => '2_2.png',
            ],
            [
                'min_power'         => 10,
                'max_power'         => 100,
                'fire_diameter'     => '500—1000 м',
                'glow_max'          => '0,1—0,3 сек',
                'glow_time'         => '2—5 сек',
                'mushroom_height'   => '7—12,2 км',
                'cloud_height'      => '2—4,5 км',
                'cloud_diameter'    => '4—10 км',
                'fire_cloud_img'    => '1_3.png',
                'nuclear_cloud_img' => '2_3.png',
            ],
            [
                'min_power'         => 100,
                'max_power'         => 1000,
                'fire_diameter'     => '1000—2000 м',
                'glow_max'          => '0,3—1 сек',
                'glow_time'         => '5—10 сек',
                'mushroom_height'   => '12,2—19 км',
                'cloud_height'      => '4,5—8,5 км',
                'cloud_diameter'    => '10—22 км',
                'fire_cloud_img'    => '1_4.png',
                'nuclear_cloud_img' => '2_4.png',
            ],
            [
                'min_power'         => 1000,
                'max_power'         => 1000000,
                'fire_diameter'     => 'понад 2000 м',
                'glow_max'          => '1-3 сек і більше',
                'glow_time'         => '20—40 сек',
                'mushroom_height'   => 'понад 19 км',
                'cloud_height'      => 'понад 8,5 км',
                'cloud_diameter'    => 'понад 22 км',
                'fire_cloud_img'    => '1_5.png',
                'nuclear_cloud_img' => '2_5.png',
            ],
        ];

        ExplosionClassification::query()->insert($explosionClassification);
    }
}
