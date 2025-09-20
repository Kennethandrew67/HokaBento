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


        Schema::create('transactionheaders', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('transaction_date');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('payment_id')->references('id')->on('payments');
        });

        Schema::create('transactiondetails', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('header_id');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->integer('quantity');
            $table->integer('price');


            $table->foreign('header_id')->references('id')->on('transactionheaders');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('promo_id')->references('id')->on('promos');
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->integer('quantity');

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     
        Schema::dropIfExists('transactionHeaders');
        Schema::dropIfExists('transactiondetails');
        Schema::dropIfExists('carts');
    }
};
