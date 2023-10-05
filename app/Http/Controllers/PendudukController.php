<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendudukController extends Controller
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
        
        $data_penduduk = Penduduk::all();
        return view('admin.penduduk.all', compact('data_penduduk'));
    }
    
    public function create()
    {
        return view('admin.penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:penduduk,nik|min:16|numeric',
            'tempat_lahir' => 'required|string|max:255',
            'no_kk' => 'required|unique:penduduk,no_kk|min:16|numeric',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:500',
            'rt' => 'nullable|numeric',
            'rw' => 'nullable|numeric',
            'agama' => 'nullable|string|max:255',
            'status_perkawinan' => 'nullable|in:Belum Menikah,Menikah,Duda,Janda',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'golongan_darah' => 'nullable|in:A,B,AB,O,Tidak Tahu',
            'kewarganegaraan' => 'nullable|in:WNI,WNA',
            'keterangan' => 'nullable|string|max:500',
        ], [
            // Pesan kesalahan kustom
            'nik.min' => 'NIK harus terdiri dari 16 karakter.',
            'no_kk.min' => 'Nomor KK harus terdiri dari 16 karakter.',
        ]);
    
        // Buat instansi baru dari model Penduduk
        $penduduk = new Penduduk([
            'nik' => $request->input('nik'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'no_kk' => $request->input('no_kk'),
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'agama' => $request->input('agama'),
            'status_perkawinan' => $request->input('status_perkawinan'),
            'pendidikan' => $request->input('pendidikan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'golongan_darah' => $request->input('golongan_darah'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'keterangan' => $request->input('keterangan'),
            'role' => $request->input('role', 'masyarakat'),
        ]);
    
        $penduduk->save();
    
        return redirect()->route('penduduk.index')->with('success_tambah_data', 'Data penduduk berhasil ditambahkan.');
    }
    
    public function show(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.show', compact('penduduk'));
        
    }

    public function edit($id)
    {
        $penduduk = Penduduk::find($id);
        if (!$penduduk) {
            return redirect()->route('penduduk.index')->with('error', 'Data penduduk tidak ditemukan.');
        }
        return view('admin.penduduk.edit', compact('penduduk'));
    }
    


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|min:16|numeric',
            'tempat_lahir' => 'required|string|max:255',
            'no_kk' => 'required|min:16|numeric',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string|max:500',
            'rt' => 'nullable|numeric',
            'rw' => 'nullable|numeric',
            'agama' => 'nullable|string|max:255',
            'status_perkawinan' => 'nullable|in:Belum Menikah,Menikah,Duda,Janda',
            'pendidikan' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'golongan_darah' => 'nullable|in:A,B,AB,O,Tidak Tahu',
            'kewarganegaraan' => 'nullable|in:WNI,WNA',
            'keterangan' => 'nullable|string|max:500',
        ], [
            // Pesan kesalahan kustom
            'nik.min' => 'NIK harus terdiri dari 16 karakter.',
            'no_kk.min' => 'Nomor KK harus terdiri dari 16 karakter.',
        ]);

        $penduduk = Penduduk::find($id);
        if (!$penduduk) {
            return redirect()->route('penduduk.index')->with('error', 'Data penduduk tidak ditemukan.');
        }
        $penduduk->update($request->all());

        return redirect()->route('penduduk.index')->with('success_edit_data', 'Data penduduk berhasil diperbarui.');

    }

    public function destroy(Penduduk $penduduk)
    {
        try {
            $penduduk->delete();
            return redirect()->route('penduduk.index')->with('success_hapus_data', 'Data penduduk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('penduduk.index')->with('error', 'Terjadi kesalahan. Data penduduk gagal dihapus.');
        }
    }
    
    public function edit_password($id)
    {
        $data_penduduk = Penduduk::find($id);
        return view('admin.penduduk.ubah-password', compact('data_penduduk'));
    }

    public function update_password(Request $request, $id)
    {
        $user = Penduduk::find($id);
    
        // Validasi bahwa password lama sesuai dengan password saat ini
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }    
    
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Update password baru
        $user->password = bcrypt($request->input('password'));
        $user->save();
    
        Auth::logout();
        
    
        return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login kembali.');
    }
    
    
}
