@extends('layouts.base')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="py-2"><strong>Pengajuan Surat Kematian</strong></h1>
                        {{-- <a href="{{ route('surat_kematian.create') }}" class="btn btn-success"><i class="bi bi-file-diff"></i> Buat Pengajuan</a> --}}
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
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal dan tempat Kematian</th>
                                    <th>NIK</th>
                                    <th>NIK Pelapor</th>
                                    <th>Jam Kematian</th>
                                    <th>Tanggal pengajuan</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_surat_kematian as $i=>$data)
                                <tr>
                                    <td>{{ 1+$i }}</td>
                                    <td>{{ $data->tempat_kematian }},{{ $data->tanggal_kematian }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->nik_pelapor }}</td>
                                    <td>{{ $data->jam_kematian }}</td>
                                    <td>{{ $data->created_at->format('d-M-Y') }}</td>
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
                                    <td>
                                        @if($data->file)
                                        <a target="_blank" href="{{ asset('storage/surat_kematian/' . $data->file) }}" class="btn btn-primary"><i class="bi bi-download"></i></a>
                                        @else
                                        <p class="text-center">-</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        
                                        @if($data->file && $data->status == 'pending')
                                        <a href="{{ route('surat_kematian.edit', $data->id) }}" class="btn btn-primary my-2">
                                            <i class="bi bi-send"></i> Kerjakan
                                        </a>
                                        @else
                                        <a href="{{ route('surat_kematian.edit', $data->id) }}" class="btn btn-warning my-2">
                                            <i class="bi bi-pen"></i> Edit
                                        </a>

                                        @endif
                                        <form action="{{ route('surat_kematian.destroy', $data->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                @if($data->status == 'pending')
                                                    &times; Batal
                                                @else
                                                    <i class="bi bi-trash"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-warning text-center">
                                            <p>
                                                <strong>Belum</strong> ada pengajuan 
                                            </p>
                                        </div>
                                    </td>
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