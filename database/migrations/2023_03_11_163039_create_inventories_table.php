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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->unique()->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventories',function(Blueprint $table){
            $table->dropForeign(['product_id']);
            $table->dropForeign(['unit_id']);
            $table->dropColumn('product_id');
            $table->dropColumn('unit_id');
        });
        Schema::dropIfExists('inventories');
    }
};
