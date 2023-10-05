<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('surat_kematian', function (Blueprint $table) {
            // Hapus kolom 'hari_kematian'
            $table->dropColumn('hari_kematian');

            // Tambah kolom 'status'
            $table->string('status')->default('pending')->nullable();
        });
    }

    public function down()
    {
        Schema::table('surat_kematian', function (Blueprint $table) {
            // Untuk melakukan rollback jika diperlukan
            $table->string('hari_kematian')->nullable();
            $table->dropColumn('status');
        });
    }
};
