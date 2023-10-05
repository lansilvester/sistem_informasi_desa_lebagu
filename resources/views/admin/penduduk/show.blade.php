@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Detail Data Penduduk</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $penduduk->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $penduduk->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $penduduk->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $penduduk->tanggal_lahir }}<br><small>(yyyy/mm/dd)</small></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $penduduk->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Kartu Keluarga (KK)</th>
                                <td>{{ $penduduk->no_kk }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $penduduk->alamat }}</td>
                            </tr>
                            <tr>
                                <th>RT</th>
                                <td>{{ $penduduk->rt }}</td>
                            </tr>
                            <tr>
                                <th>RW</th>
                                <td>{{ $penduduk->rw }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $penduduk->agama }}</td>
                            </tr>
                            <tr>
                                <th>Status Perkawinan</th>
                                <td>{{ $penduduk->status_perkawinan }}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>{{ $penduduk->pendidikan }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $penduduk->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>{{ $penduduk->golongan_darah }}</td>
                            </tr>
                            <tr>
                                <th>Kewarganegaraan</th>
                                <td>{{ $penduduk->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $penduduk->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('penduduk.index') }}" class="btn btn-info"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <a href="{{ route('penduduk.index') }}" class="btn btn-warning"><i class="bi bi-pen"></i> Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
