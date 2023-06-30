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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_GUID');
            $table->string('unit_code');
            $table->string('unit_brand');
            $table->string('unit_type');
            $table->string('unit_condition');
            $table->string('unit_VIN');
            $table->string('unit_LICENSE');
            $table->string('unit_LICENSE_type');
            $table->string('unit_color');
            $table->string('unit_RegYear');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
