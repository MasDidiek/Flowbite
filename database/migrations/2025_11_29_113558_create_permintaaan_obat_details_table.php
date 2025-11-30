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
        Schema::create('permintaan_obat_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permintaan_id');
            $table->unsignedBigInteger('obat_id');
            $table->integer('qty');
            $table->integer('qty_dikirim');
            $table->integer('qty_diterima');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('permintaan_id')->references('id')->on('permintaans')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_obat_details');
    }
};
