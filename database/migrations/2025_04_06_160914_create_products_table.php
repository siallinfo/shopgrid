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
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('name');
            $table->string('code');
            $table->float('regular_price');
            $table->float('selling_price');
            $table->integer('stock');
            $table->text('short_description');
            $table->longText('long_description');
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('image');
            $table->tinyInteger('status');
            $table->integer('hit_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->integer('feature_status')->default(0);
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
