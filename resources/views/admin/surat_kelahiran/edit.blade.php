@extends('layouts.base')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Data Surat Kelahiran</h1>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        
            <form method="POST" action="{{ route('surat_kelahiran.update', $suratKelahiran->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <!-- Field untuk NIK Ayah -->
                <div class="mb-3">
                    <label for="nik_ayah" class="form-label">NIK Ayah</label>
                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="{{ $suratKelahiran->nik_ayah }}" required>
                </div>
        
                <!-- Field untuk NIK Ibu -->
                <div class="mb-3">
                    <label for="nik_ibu" class="form-label">NIK Ibu</label>
                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="{{ $suratKelahiran->nik_ibu }}" required>
                </div>
        
                <!-- Field untuk NIK Pelapor -->
                <div class="mb-3">
                    <label for="nik_pelapor" class="form-label">NIK Pelapor</label>
                    <p class="form-control">{{ $suratKelahiran->nik_pelapor }}</p>
                </div>
        
                <!-- Field untuk Nama Anak -->
                <div class="mb-3">
                    <label for="nama_anak" class="form-label">Nama Anak</label>
                    <input type="text" class="form-control" id="nama_anak" name="nama_anak" value="{{ $suratKelahiran->nama_anak }}" required>
                </div>
        
                <!-- Field untuk Jenis Kelamin -->
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" @if($suratKelahiran->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if($suratKelahiran->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
        
                <!-- Field untuk Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $suratKelahiran->tempat_lahir }}" required>
                </div>
        
                <!-- Field untuk Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $suratKelahiran->tanggal_lahir }}" required>
                </div>
        
                <!-- Field untuk Jam Lahir -->
                <div class="mb-3">
                    <label for="jam_lahir" class="form-label">Jam Lahir</label>
                    <input type="time" class="form-control" id="jam_lahir" name="jam_lahir" value="{{ $suratKelahiran->jam_lahir }}" required>
                </div>
        
                <!-- Field untuk Hubungan dengan Pelapor -->
                <div class="mb-3">
                    <label for="hubungan_sebagai" class="form-label">Hubungan dengan Pelapor</label>
                    <input type="text" class="form-control" id="hubungan_sebagai" name="hubungan_sebagai" value="{{ $suratKelahiran->hubungan_sebagai }}" required>
                </div>
        
                <!-- Field untuk Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" @if($suratKelahiran->status == 'pending') selected @endif>Pending</option>
                        <option value="accept" @if($suratKelahiran->status == 'accept') selected @endif>Accept</option>
                    </select>
                </div>
        
                <!-- Field untuk Unggah Berkas PDF (File) -->
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah Berkas PDF</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
        
                <a href="{{ route('surat_kelahiran.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
    
        </div>
    </div>

</div>
@endsection
