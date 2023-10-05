@extends('layouts.base')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="py-2"><strong>Pengajuan Kependudukan</strong></h1>
                        {{-- <a href="{{ route('pengajuan_penduduk.create') }}" class="btn btn-success"><i class="bi bi-file-diff"></i> Buat Pengajuan</a> --}}
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
                                    <th>Request Data</th>
                                    <th>Pesan Pengajuan</th>
                                    <th>Status</th>
                                    <th>NIK Penduduk</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_pengajuan_penduduk as $i => $data)
                                <tr>
                                    <td>{{ 1 + $i }}</td>                      
                                    <td>{{ $data->request_data }}</td>
                                    <td>{{ $data->pesan_pengajuan }}</td>
                                    <td>
                                        @if($data->status == 'pending')
                                            <span class="badge bg-warning">
                                                {{ $data->status }}
                                            </span>
                                        @endif
                                        @if($data->status == 'accept')
                                            <span class="badge bg-success">
                                                {{ $data->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $data->penduduk->nik }}<br><small>({{ $data->penduduk->nama }})</small></td>
                                    <td>
                                        <div class="mb-4">
                                            <h6>Tanggal Pengajuan</h6>
                                            {{ $data->created_at->format('d-M-Y') }}
                                        </div>
                                        <div>
                                            <h6>Tanggal Diubah</h6>
                                            {{ $data->updated_at->format('d-M-Y') }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('pengajuan_penduduk.destroy', $data->id) }}" method="POST" style="display: block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <a href="{{ route('penduduk.edit', $data->penduduk->id) }}" class="btn btn-primary my-2"><i class="bi bi-pen"></i> Kerjakan</a>
                                        
                                        @if($data->status == 'pending')
                                        <form action="{{ route('pengajuan_penduduk.check', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-check"></i> Check
                                            </button>
                                        </form>
                                        @endif
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