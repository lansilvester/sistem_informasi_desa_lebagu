<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Penduduk as Authenticatable;

class Penduduk extends Authenticatable{

    use HasFactory;
    protected $table = 'penduduk';
    protected $guarded = ['id'];

    public function pengajuan_kependudukan(){
        return $this->hasMany(PengajuanKependudukan::class);
    }
    public function hasAnyRole(...$roles)
    {
        return in_array($this->role, $roles);
    }
}