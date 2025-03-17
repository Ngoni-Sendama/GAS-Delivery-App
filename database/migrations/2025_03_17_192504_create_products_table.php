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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');

            // Product Details
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->float('price');
            $table->float('delivery_charge');
            $table->integer('stock_quantity')->default(0);
            $table->string('brand', 100)->nullable();
            $table->json('images', 250);

            // When On Sale
            $table->string('sale_price')->nullable();
            $table->string('sale_price_effective_date')->nullable();

            //  Product Status
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
