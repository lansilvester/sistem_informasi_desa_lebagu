@extends('layouts.base')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="py-2"><strong>Data Kegiatan</strong></h1>
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-success"><i class="bi bi-file-diff"></i> Tambah Kegiatan</a>
                    </div>
                    <div class="card-body">
                        @if(session('success_tambah_data'))
                            <div class="alert alert-success text-success">
                                {{ session('success_tambah_data') }}
                            </div>
                        @endif
                        @if(session('success_edit_data'))
                            <div class="alert alert-success text-success">
                                {{ session('success_edit_data') }}
                            </div>
                        @endif
                        @if(session('success_hapus_data'))
                            <div class="alert alert-success text-success">
                                {{ session('success_hapus_data') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto Kegiatan</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_kegiatan as $i => $kegiatan)
                                <tr>
                                    <td>{{ 1 + $i }}</td>
                                    <td class="text-center">
                                        @if ($kegiatan->foto)
                                            <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="{{ $kegiatan->nama_kegiatan }}" class="img-fluid" width="250px">
                                        @else
                                            <!-- Tampilkan pesan jika tidak ada gambar -->
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>                                    
                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $kegiatan->keterangan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-warning">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection