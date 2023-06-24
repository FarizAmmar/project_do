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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_GUID');
            $table->foreignId('delivery_unit');
            $table->foreignId('delivery_driver');
            $table->string('delivery_senderName');
            $table->string('delivery_bbn');
            $table->string('delivery_sales');
            $table->string('delivery_spv');
            $table->date('delivery_date');
            $table->string('delivery_addressFrom');
            $table->string('delivery_addressTo');
            $table->string('delivery_description');
            $table->string('delivery_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
