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
        Schema::create('explosion_examples', function (Blueprint $table) {
            $table->id();
            $table->string('operation')    ->nullable();
            $table->string('code_name')     ->nullable();
            $table->string('device');
            $table->string('country');
            $table->string('test_site');
            $table->string('date');
            $table->string('test_type');
            $table->float('power');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('explosion_examples');
    }
};
