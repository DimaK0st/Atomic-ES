<?php

namespace App\Constants;

class Constants
{
    static public float $ONE_GRAM_POWER = 0.02; //in KT
    static public float $URANIUM_PROGRESSION_KOEF = 2.45;
    static public float $URANIUM_GENERATION_TIME = 7;
    static public float $URANIUM_MINIMAL_PURITY = 50;
    static public float $URANIUM_ATOMIC_MASS = 235.0439299;
    static public float $PLUTONIUM_PROGRESSION_KOEF = 2.9;
    static public float $PLUTONIUM_GENERATION_TIME = 5.6;
    static public float $PLUTONIUM_MINIMAL_PURITY = 93;
    static public float $PLUTONIUM_ATOMIC_MASS = 239.0521634;
    static public float $CORE_STABILITY_THRESHOLD = 500;
    static public float $AVOGADRO = 6.022E+23;
    static public array $CORE_MATERIAL = ['Uranium' => 'Uranium', 'Plutonium' => 'Plutonium'];
    static public array $TEMPER_MATERIAL = ['Node' => 'None', 'Uranium' => 'Uranium', 'Beryllium' => 'Beryllium'];
}

