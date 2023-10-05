<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
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
                
        $data_kegiatan = Kegiatan::all();
        return view('admin.kegiatan.all', compact('data_kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'keterangan' => 'required|string',
        ]);

        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
        
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan_foto', 'public');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->keterangan = $request->input('keterangan');
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $kegiatan = Kegiatan::find($id);
    
        if (!$kegiatan) {
            return redirect()->route('kegiatan.index')->with('error', 'Kegiatan tidak ditemukan.');
        }
    
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string',
        ]);
    
        $kegiatan = Kegiatan::find($id);
    
        if (!$kegiatan) {
            return redirect()->route('kegiatan.index')->with('error', 'Kegiatan tidak ditemukan.');
        }
    
        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
    
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan_foto', 'public');
            $kegiatan->foto = $fotoPath;
        }
    
        $kegiatan->keterangan = $request->input('keterangan');
        $kegiatan->save();
    
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::find($id);
    
        if (!$kegiatan) {
            return redirect()->route('kegiatan.index')->with('error', 'Kegiatan tidak ditemukan.');
        }
        if ($kegiatan->foto) {
            Storage::disk('public')->delete($kegiatan->foto);
        }
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success_hapus_data', 'Kegiatan berhasil dihapus.');
    }
}
