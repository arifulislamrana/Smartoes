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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['order_id', 'product_id']);
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function(Blueprint $table){
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('order_items');
    }
};
