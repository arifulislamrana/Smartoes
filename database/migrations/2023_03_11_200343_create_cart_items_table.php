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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unique(['user_id', 'product_id']);
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('cart_items');
    }
};
