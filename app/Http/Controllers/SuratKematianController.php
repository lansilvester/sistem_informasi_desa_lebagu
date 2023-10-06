<?php

namespace App\Http\Controllers;

use App\Models\SuratKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKematianController extends Controller
{
    
    public function index()
    {
        $data_surat_kematian = SuratKematian::all();
        return view('admin.surat_kematian.all', compact(
            'data_surat_kematian'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'nullable|string|max:18',
            'nik_pelapor' => 'nullable|string|max:18',
            'tempat_kematian' => 'nullable|string|max:255',
            'tanggal_kematian' => 'nullable|date',
            'jam_kematian' => 'nullable|date_format:H:i',
            'hari_kematian' => 'nullable|string|max:255',
            'hubungan_dengan_pelapor' => 'nullable|string|max:255',
        ]);

        $suratKematian = new SuratKematian([
            'nik' => $request->input('nik'),
            'nik_pelapor' => Auth::user()->nik,
            'tempat_kematian' => $request->input('tempat_kematian'),
            'tanggal_kematian' => $request->input('tanggal_kematian'),
            'jam_kematian' => $request->input('jam_kematian'),
            'hari_kematian' => $request->input('hari_kematian'),
            'hubungan_dengan_pelapor' => $request->input('hubungan_dengan_pelapor'),
        ]);

        // Simpan data ke database
        $suratKematian->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Surat kematian berhasil disimpan.');
    }
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $suratKematian = SuratKematian::find($id);

        return view('admin.surat_kematian.edit', compact('suratKematian'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'nik' => 'required|string',
            'nik_pelapor' => 'string',
            'tempat_kematian' => 'required|string',
            'tanggal_kematian' => 'required|date',
            'jam_kematian' => 'required',
            'hubungan_dengan_pelapor' => 'required|string',
            'status' => 'required|in:pending,accept',
            'file' => 'nullable|max:2048', 
        ]);

        // Cari data Surat Kematian berdasarkan ID
        $suratKematian = SuratKematian::findOrFail($id);

        // Update data Surat Kematian
        $suratKematian->nik = $request->input('nik');
        $suratKematian->tempat_kematian = $request->input('tempat_kematian');
        $suratKematian->tanggal_kematian = $request->input('tanggal_kematian');
        $suratKematian->jam_kematian = $request->input('jam_kematian');
        $suratKematian->hubungan_dengan_pelapor = $request->input('hubungan_dengan_pelapor');
        $suratKematian->status = $request->input('status');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_kematian', $fileName);

            $suratKematian->file = $fileName;
        }

        $suratKematian->save();

        return redirect()->route('surat_kematian.index')->with('success', 'Data Surat Kematian berhasil diperbarui.');
    }
    

    public function destroy(string $id)
    {
        $surat_kematian = SuratKematian::find($id);
    
        if (!$surat_kematian) {
            return redirect()->route('dashboard')->with('error', 'Surat kematian tidak ditemukan.');
        }
    
        // Menghapus file terkait jika ada
        if (!empty($surat_kematian->file)) {
            Storage::delete('surat_kematian/' . $surat_kematian->file);
        }
    
        $surat_kematian->delete();
        return redirect()->route('surat_kematian.index')->with('success_hapus_data', 'Pengajuan surat kematian berhasil dihapus.');
    }
}
