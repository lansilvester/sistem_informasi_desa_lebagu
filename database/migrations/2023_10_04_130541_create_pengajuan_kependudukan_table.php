<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengajuan_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('request_data')->nullable();
            $table->text('pesan_pengajuan')->nullable();
            $table->text('status')->default('pending')->nullable();
            $table->unsignedBigInteger('id_penduduk');
            $table->timestamps();

            $table->foreign('id_penduduk')->references('id')->on('penduduk');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_kependudukan');
    }
};
