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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_permission');
            $table->timestamps();

            $table->foreign('id_role')->references('id')->on('role');
            $table->foreign('id_permission')->references('id')->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};