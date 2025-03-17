<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  class CreateBengkelTables extends Migration
  {
      public function up()
      {
          Schema::create('pelanggan', function (Blueprint $table) {
              $table->id();
              $table->string('nama');
              $table->string('alamat');
              $table->string('telepon');
              $table->timestamps();
          });

          Schema::create('kendaraan', function (Blueprint $table) {
              $table->id();
              $table->string('nomor_polisi');
              $table->string('merk');
              $table->string('model');
              $table->foreignId('pelanggan_id')->constrained('pelanggan');
              $table->timestamps();
          });

          Schema::create('layanan', function (Blueprint $table) {
              $table->id();
              $table->string('nama');
              $table->decimal('harga', 10, 2);
              $table->timestamps();
          });

          Schema::create('transaksi', function (Blueprint $table) {
              $table->id();
              $table->foreignId('pelanggan_id')->constrained('pelanggan');
              $table->foreignId('kendaraan_id')->constrained('kendaraan');
              $table->foreignId('layanan_id')->constrained('layanan');
              $table->date('tanggal');
              $table->decimal('total', 10, 2);
              $table->timestamps();
          });
      }

      public function down()
      {
          Schema::dropIfExists('transaksi');
          Schema::dropIfExists('layanan');
          Schema::dropIfExists('kendaraan');
          Schema::dropIfExists('pelanggan');
      }
  }