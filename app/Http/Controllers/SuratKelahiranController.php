<?php

namespace App\Http\Controllers;

use App\Models\SuratKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKelahiranController extends Controller
{
    public function index()
    {
        $data_surat_kelahiran = SuratKelahiran::all();
        return view('admin.surat_kelahiran.all', compact(
            'data_surat_kelahiran'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik_ayah' => 'nullable|numeric',
            'nik_ibu' => 'nullable|numeric',
            'nik_pelapor' => 'nullable|numeric',
            'nama_anak' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jam_lahir' => 'nullable|date_format:H:i',
            'hubungan_sebagai' => 'nullable|string|max:255',
        ]);

        $surat_kelahiran = new SuratKelahiran([
            'nik_ayah' => $request->nik_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nik_pelapor' => Auth::user()->nik,
            'nama_anak' => $request->nama_anak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jam_lahir' => $request->jam_lahir,
            'hubungan_sebagai' => $request->hubungan_sebagai,
        ]);

        $surat_kelahiran->save();

        return redirect()->back()->with('success', 'Surat kelahiran berhasil disimpan.');
    
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $suratKelahiran = SuratKelahiran::find($id);
    
        return view('admin.surat_kelahiran.edit', compact('suratKelahiran'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'nik_ayah' => 'required|string',
            'nik_ibu' => 'required|string',
            'nama_anak' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jam_lahir' => 'required',
            'hubungan_sebagai' => 'required|string',
            'status' => 'required|in:pending,accept',
            'file' => 'nullable|max:2048',
        ]);
    
        // Cari data Surat Kelahiran berdasarkan ID
        $suratKelahiran = SuratKelahiran::findOrFail($id);
    
        // Update data Surat Kelahiran
        $suratKelahiran->nik_ayah = $request->input('nik_ayah');
        $suratKelahiran->nik_ibu = $request->input('nik_ibu');
        $suratKelahiran->nama_anak = $request->input('nama_anak');
        $suratKelahiran->jenis_kelamin = $request->input('jenis_kelamin');
        $suratKelahiran->tempat_lahir = $request->input('tempat_lahir');
        $suratKelahiran->tanggal_lahir = $request->input('tanggal_lahir');
        $suratKelahiran->jam_lahir = $request->input('jam_lahir');
        $suratKelahiran->hubungan_sebagai = $request->input('hubungan_sebagai');
        $suratKelahiran->status = $request->input('status');
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_kelahiran', $fileName);
    
            $suratKelahiran->file = $fileName;
        }
    
        $suratKelahiran->save();
    
        return redirect()->route('surat_kelahiran.index')->with('success', 'Data Surat Kelahiran berhasil diperbarui.');
    }
    

    public function destroy(string $id)
    {
        $surat_kelahiran = SuratKelahiran::find($id);
    
        if (!$surat_kelahiran) {
            return redirect()->route('dashboard')->with('error', 'Surat kematian tidak ditemukan.');
        }
    
        // Menghapus file terkait jika ada
        if (!empty($surat_kelahiran->file)) {
            Storage::delete('surat_kelahiran/' . $surat_kelahiran->file);
        }
    
        $surat_kelahiran->delete();
        return redirect()->route('surat_kelahiran.index')->with('success_hapus_data', 'Pengajuan surat kelahiran berhasil dihapus.');
    }
}
