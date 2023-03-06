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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code');
            $table->string('ps');
            $table->string('district');
            $table->string('division');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
        });
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('users');
    }
};
