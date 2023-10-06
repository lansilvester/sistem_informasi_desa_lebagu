<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->string('nik_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nik_pelapor')->nullable();
            $table->string('nama_anak')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->time('jam_lahir')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->string('hubungan_sebagai')->nullable();
            $table->string('file')->nullable();

            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_kelahiran');
    }
};
