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
        Schema::create('banks', function (Blueprint $table) {
            $table->id()->primary();
            $table->string("company");
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id()->primary();
            $table->string("payment_method");
            $table->unsignedBigInteger('bank_id')->nullable();

            $table->foreign('bank_id')->references('id')->on('banks');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
        Schema::dropIfExists('payments');
    }
};
