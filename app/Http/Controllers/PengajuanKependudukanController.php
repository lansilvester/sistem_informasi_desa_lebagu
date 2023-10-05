<?php

namespace App\Http\Controllers;

use App\Models\PengajuanKependudukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanKependudukanController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            
            if ($user && $user->role === 'masyarakat') {
                return redirect()->route('dashboard');
            }

            return $next($request);
        });
    }
    public function index()
    {
        $data_pengajuan_penduduk = PengajuanKependudukan::all();
        return view('admin.pengajuan_penduduk.all', compact(
            'data_pengajuan_penduduk'
        ));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'request_data' => 'required|string',
            'pesan_pengajuan' => 'nullable|string',
        ]);

        $pengajuan = new PengajuanKependudukan();
        $pengajuan->request_data = $request->input('request_data');
        $pengajuan->pesan_pengajuan = $request->input('pesan_pengajuan');
        $pengajuan->id_penduduk = Auth::user()->id;
        
        $pengajuan->save();

        return redirect()->back()->with('pengajuan_success', 'Pengajuan kependudukan berhasil diajukan.');
    }
    public function check($id)
    {
        $pengajuan = PengajuanKependudukan::find($id);
        
        if ($pengajuan) {
            $pengajuan->status = 'accept'; // Ubah sesuai status yang Anda butuhkan
            $pengajuan->save();
        }
    
        return redirect()->back()->with('success_check_data', 'Pengajuan berhasil diperiksa.');
    }
    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        $pengajuan_kependudukan = PengajuanKependudukan::find($id);
    
        if (!$pengajuan_kependudukan) {
            return redirect()->route('dashboard')->with('error', 'pengajuan_kependudukan tidak ditemukan.');
        }
        $pengajuan_kependudukan->delete();
        return redirect()->route('dashboard')->with('success_hapus_data', 'pengajuan kependudukan berhasil dihapus.');
    }
}
