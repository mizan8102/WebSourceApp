<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('city_ascii');
            $table->string('state_id');
            $table->string('state_name');
            $table->string('county_fips');
            $table->string('county_name');
            $table->string('lat');
            $table->string('lng');
            $table->bigInteger('population');
            $table->decimal('density');
            $table->string('source');
            $table->string('military');
            $table->string('incorporated');
            $table->string('timezone');
            $table->integer('ranking');
            $table->string('zips');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cities');
    }
};
