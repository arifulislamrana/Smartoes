<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('division_id')->constrained('divisions')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('police_stations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('district_id')->constrained('districts')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('post_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('police_station_id')->constrained('police_stations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_codes');
        Schema::dropIfExists('police_stations');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('divisions');
    }
};
