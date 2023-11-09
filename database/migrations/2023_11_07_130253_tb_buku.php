<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('tb_buku', function (Blueprint $table) {
      $table->id();
      $table->string('judul');
      $table->date('tahun');
      $table->unsignedBigInteger('id_pengarang');
      $table->unsignedBigInteger('id_kategori');

      $table->foreign('id_pengarang')->references('id')->on('tb_pengarang');
      $table->foreign('id_kategori')->references('id')->on('tb_kategori');

      $table->timestamps();
    });
    DB::statement("ALTER TABLE tb_buku ADD sampul MEDIUMBLOB");
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tb_buku');
  }
};
