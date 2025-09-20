<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('address');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string(column: 'name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('role');
            $table->integer("member_point")->default(0);
            $table->unsignedBigInteger('staff_branch_id')->nullable();

            $table->foreign('staff_branch_id')->references('id')->on('branches');

        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
