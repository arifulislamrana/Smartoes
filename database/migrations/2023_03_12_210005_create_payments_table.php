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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('total', 8, 2);
            $table->string('payment_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function(Blueprint $table){
            $table->dropForeign(['order_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('payments');
    }
};
