@extends('layouts.base')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="py-2"><strong>Data Penduduk</strong></h1>
                        <a href="{{ route('penduduk.create') }}" class="btn btn-success"><i class="bi bi-file-diff"></i> Tambah Data Penduduk</a>
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_penduduk as $i=>$penduduk)
                                <tr>
                                    <td>{{ 1+$i }}</td>
                                    <td>{{ $penduduk->nik }}</td>
                                    <td>{{ $penduduk->nama }}</td>
                                    <td>{{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir }}</td>
                                    <td>{{ $penduduk->alamat }}</td>
                                    <td>{{ $penduduk->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('penduduk.show', $penduduk->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                                        <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection