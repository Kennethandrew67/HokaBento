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
            $table->id()->primary();
            $table->string("product_name");
            $table->string("product_type");
            $table->integer("product_point");
            $table->integer("product_price");
            $table->string("product_image");
            $table->timestamps();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id()->primary();
            $table->string("package_name");
            $table->integer("package_price");
            $table->string("package_image");
            $table->timestamps();
        });

        Schema::create('packages_products', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger("product_id");

            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('product_id')->references('id')->on('products');

            $table->primary(['package_id', 'product_id']);
        });

        Schema::create('promos', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('start_date');
            $table->date('end_date');
            $table->float("discount");
        });

        Schema::create('packages_promos', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_id');
            $table->unsignedBigInteger("package_id");

            $table->foreign('promo_id')->references('id')->on('promos');
            $table->foreign('package_id')->references('id')->on('packages');

            $table->primary(['promo_id', 'package_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('packages_products');
        Schema::dropIfExists('promos');
        Schema::dropIfExists('packages_promos');
    }
};
