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
            $table->Integer('cat_id');
            $table->Integer('subcat_id');
            $table->Integer('brand_id');
            $table->Integer('unit_id');
            $table->Integer('size_id');
            $table->Integer('color_id');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
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
