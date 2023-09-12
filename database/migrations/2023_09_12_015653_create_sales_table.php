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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('id_invoice');
            $table->unsignedBiginteger('id_employee');
            $table->date('sales_date');
            $table->timestamps();

            $table->foreign('id_invoice')->references('id')->on('invoice');
            $table->foreign('id_employee')->references('id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};