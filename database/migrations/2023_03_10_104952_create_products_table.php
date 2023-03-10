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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('selling_price');
            $table->string('buying_price');
            $table->boolean('status')->default(true);
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('code')->unique();
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->onUpdate('cascade')->onDelete('cascade');
            $table->string('thumbnail');
            $table->string('details_photo')->nullable();
            $table->timestamps();
        });

        Schema::create('product_size', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('size_id')->constrained('sizes')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('brand_product', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('product_vendor', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained('vendors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function(Blueprint $table){
            $table->dropForeign(['category_id']);
            $table->dropForeign(['discount_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('discount_id');
        });

        Schema::table('product_vendor', function(Blueprint $table){
            $table->dropForeign(['product_id']);
            $table->dropForeign(['vendor_id']);
        });

        Schema::table('brand_product', function(Blueprint $table){
            $table->dropForeign(['product_id']);
            $table->dropForeign(['brand_id']);
        });

        Schema::table('product_size', function(Blueprint $table){
            $table->dropForeign(['product_id']);
            $table->dropForeign(['size_id']);
        });

        Schema::table('product_tag', function(Blueprint $table){
            $table->dropForeign(['product_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('products');
        Schema::dropIfExists('sizes');
        Schema::dropIfExists('product_tag');
        Schema::dropIfExists('product_size');
        Schema::dropIfExists('brand_product');
        Schema::dropIfExists('product_vendor');
    }
};
