<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKelahiran extends Model
{
    use HasFactory;
    protected $table = 'surat_kelahiran';

    protected $guarded = ['id'];
}
