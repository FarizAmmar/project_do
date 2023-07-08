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
            $table->foreignId('unit_id');
            $table->foreignId('driver_id')->nullable();
            $table->string('delivery_GUID');
            $table->string('delivery_submited_by')->nullable();
            $table->string('delivery_senderName');
            $table->string('delivery_codeUnit');
            $table->string('delivery_bbn');
            $table->string('delivery_sales');
            $table->string('delivery_spv');
            $table->date('delivery_date');
            $table->string('delivery_addressTo');
            $table->string('delivery_description')->nullable();
            $table->string('delivery_custemail');
            $table->string('delivery_status');
            $table->string('delivery_additional')->nullable();
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
