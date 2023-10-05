<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nik_pelapor')->nullable();
            $table->string('tempat_kematian')->nullable();
            $table->date('tanggal_kematian')->nullable();
            $table->time('jam_kematian')->nullable();
            $table->string('hari_kematian')->nullable();
            $table->string('hubungan_dengan_pelapor')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_kematian');
    }
};
