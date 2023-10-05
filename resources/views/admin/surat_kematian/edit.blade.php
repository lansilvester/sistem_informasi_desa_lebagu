@extends('layouts.base')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Data Surat Kematian</h1>
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
        
            <form method="POST" action="{{ route('surat_kematian.update', $suratKematian->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <!-- Field untuk NIK Pelapor -->
                <div class="mb-3">
                    <label for="nik_pelapor" class="form-label">NIK Pelapor</label>
                    <p class="form-control">{{ $suratKematian->nik_pelapor }}</p>
                </div>
        
                <!-- Field untuk NIK -->
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK yang meninggal</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $suratKematian->nik }}" required>
                </div>
        
                <!-- Field untuk Tempat Kematian -->
                <div class="mb-3">
                    <label for="tempat_kematian" class="form-label">Tempat Kematian</label>
                    <input type="text" class="form-control" id="tempat_kematian" name="tempat_kematian" value="{{ $suratKematian->tempat_kematian }}" required>
                </div>
        
                <!-- Field untuk Tanggal Kematian -->
                <div class="mb-3">
                    <label for="tanggal_kematian" class="form-label">Tanggal Kematian</label>
                    <input type="date" class="form-control" id="tanggal_kematian" name="tanggal_kematian" value="{{ $suratKematian->tanggal_kematian }}" required>
                </div>
        
                <!-- Field untuk Jam Kematian -->
                <div class="mb-3">
                    <label for="jam_kematian" class="form-label">Jam Kematian</label>
                    <input type="time" class="form-control" id="jam_kematian" name="jam_kematian" value="{{ $suratKematian->jam_kematian }}" required>
                </div>
        
                <!-- Field untuk Hubungan dengan Pelapor -->
                <div class="mb-3">
                    <label for="hubungan_dengan_pelapor" class="form-label">Hubungan dengan Pelapor</label>
                    <input type="text" class="form-control" id="hubungan_dengan_pelapor" name="hubungan_dengan_pelapor" value="{{ $suratKematian->hubungan_dengan_pelapor }}" required>
                </div>
        
                <!-- Field untuk Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" @if($suratKematian->status == 'pending') selected @endif>Pending</option>
                        <option value="accept" @if($suratKematian->status == 'accept') selected @endif>Accept</option>
                    </select>
                </div>
        
                <!-- Field untuk Unggah Berkas PDF (File) -->
                <div class="mb-3">
                    <label for="file" class="form-label">Unggah Berkas PDF</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
        
                <a href="{{ route('surat_kematian.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
    
        </div>
    </div>

</div>
@endsection