<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('explosion_classifications', function (Blueprint $table) {
            $table->id();
            $table->integer('min_power');
            $table->integer('max_power');
            $table->string('fire_diameter');
            $table->string('glow_max');
            $table->string('glow_time');
            $table->string('mushroom_height');
            $table->string('cloud_height');
            $table->string('cloud_diameter');
            $table->string('fire_cloud_img');
            $table->string('nuclear_cloud_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explosion_classifications');
    }
};
