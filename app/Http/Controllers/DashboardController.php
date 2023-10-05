<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Penduduk;
use App\Models\PengajuanKependudukan;
use App\Models\SuratKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(){
        $data_penduduk = Penduduk::all();
        $data_kegiatan = Kegiatan::all();

        $data_pengajuan_kependudukan_by = PengajuanKependudukan::where('id_penduduk', Auth::user()->id)->get();
        $data_pengajuan_kependudukan = PengajuanKependudukan::where('status','pending')->get();

        $data_surat_kematian_by = SuratKematian::where('nik_pelapor', Auth::user()->nik)->get();
        $data_surat_kematian = SuratKematian::where('status','pending')->get();

        $data_pribadi = Penduduk::find(Auth::user()->id);

        return view('admin.dashboard', compact(
            'data_penduduk',
            'data_kegiatan',
            'data_pengajuan_kependudukan_by',
            'data_pengajuan_kependudukan',
            'data_surat_kematian_by',
            'data_surat_kematian',
            'data_pribadi'
        ));
    }
}
