<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('surat_kematian', function (Blueprint $table) {
            $table->string('file')->nullable();
        });
    }

    public function down()
    {
        Schema::table('surat_kematian', function (Blueprint $table) {
            $table->dropColumn('file');
        });
    }
};
