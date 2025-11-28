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
        Schema::create('tbl_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->unsignedBigInteger("id_barang");
            $table->integer("qty");
            $table->integer("price");
            $table->string("no_faktur");
            $table->string("batch_no");
            $table->date("expired_date");
            $table->string("pengirim");
            $table->string("penerima");
            $table->string("notes");
            $table->timestamps();

            $table->foreign("id_barang")->references("id")->on("tbl_barang");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
