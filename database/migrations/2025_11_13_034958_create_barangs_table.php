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
        Schema::create("tbl_barang", function (Blueprint $table) {
            $table->id();
            $table->string("kode_barang");
            $table->string("sumber_dana");
            $table->string("name");
            $table->unsignedBigInteger("id_category");
            $table->unsignedBigInteger("id_subcategory");
            $table->string("satuan");
            $table->integer("stock");
            $table->string("merk");
            $table->string("penyedia");
            $table->string("image");
            $table->text("description");
            $table->timestamps();

            $table
                ->foreign("id_subcategory")
                ->references("id")
                ->on("subcategories")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
