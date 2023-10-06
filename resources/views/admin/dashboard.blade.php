@extends('layouts.base')

@section('content')
<div class="container-fluid p-0">

	<h3 class="h3 mb-3"><strong>Selamat Datang</strong> {{ Auth::user()->nama }}</h3>
	
	@if(Auth::user()->role !== 'masyarakat')
	<div class="row">
		<div class="col-12 d-flex">
			<div class="w-100">
				<div class="row">
					
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Jumlah Warga</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle bi bi-person"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $data_penduduk->count() }}</h1>
								
							</div>
						</div>
                    </div>
					
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Pengajuan Data Kependudukan</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="bi bi-archive"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $data_pengajuan_kependudukan->count() }}</h1>
								
							</div>
						</div>
                    </div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Pengajuan Surat Kematian</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="bi bi-archive"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $data_surat_kematian->count() }}</h1>
								
							</div>
						</div>
                    </div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Pengajuan Surat Kelahiran</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="bi bi-archive"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $data_surat_kelahiran->count() }}</h1>
								
							</div>
						</div>
                    </div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Jumlah Kegiatan</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-primary">
											<i class="bi bi-calendar-check"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3">{{ $data_kegiatan->count() }}</h1>
								
							</div>
						</div>
                    </div>



				</div>
			</div>
		</div>
	</div>
	@endif
	<button type="button" class="btn btn-warning my-3" data-bs-toggle="modal" data-bs-target="#LihatData">Data Pengajuan Saya 
		<i class="bi bi-table"></i> 
	</button>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
			@if(session('success_tambah_data'))
				<div class="alert alert-success text-success">
					{{ session('success_tambah_data') }}
				</div>
			@endif
			<div class="card bg-body-secondary border border-0 p-2">
				<div class="card-body">
					<h5>Ajukan update data kependudukan</h5>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateDataModal">Buat Pengajuan 
						<i class="bi bi-send-plus"></i> 
					</button>
				</div>
			</div>

			<div class="modal fade" id="updateDataModal" tabindex="-1" aria-labelledby="updateDataModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="updateDataModalLabel">Buat Pengajuan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ route('pengajuan_penduduk.store') }}">
								@csrf
								<div class="mb-3">
									<label for="request_data" class="form-label">Data Kependudukan Baru</label>
									<input class="form-control" id="request_data" name="request_data" />
								</div>
								<div class="mb-3">
									<label for="pesan_pengajuan" class="form-label">Pesan Pengajuan (Opsional)</label>
									<textarea class="form-control" id="pesan_pengajuan" name="pesan_pengajuan" rows="4"></textarea>
								</div>
								<input type="hidden" name="id_penduduk" value="{{ Auth::user()->id }}">
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Kirim Pengajuan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
			@if(session('success_tambah_data'))
				<div class="alert alert-success text-success">
					{{ session('success_tambah_data') }}
				</div>
			@endif
			<div class="card bg-body-secondary border border-0 p-2">
				<div class="card-body">
					<h5>Pengajuan Surat</h5>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#surat_kematian">Surat Kematian 
						<i class="bi bi-send-plus"></i> 
					</button>
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#surat_kelahiran">Surat Kelahiran 
						<i class="bi bi-send-plus"></i> 
					</button>
				</div>
			</div>

			<div class="modal fade" id="surat_kematian" tabindex="-1" aria-labelledby="surat_kematianLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="updateDataModalLabel">Surat Kematian</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ route('surat_kematian.store') }}">
								@csrf
							
								<div class="mb-3">
									<label for="nik_pelapor" class="form-label">NIK Pelapor</label>
									<input type="text" class="form-control @error('nik_pelapor') is-invalid @enderror" id="nik_pelapor" name="nik_pelapor" value="{{ Auth::user()->nik }}" placeholder="Masukkan NIK Pelapor" readonly disabled>
									@error('nik_pelapor')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="nik" class="form-label">NIK yang meninggal</label>
									<input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK">
									@error('nik')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="tempat_kematian" class="form-label">Tempat Kematian</label>
									<input type="text" class="form-control @error('tempat_kematian') is-invalid @enderror" id="tempat_kematian" name="tempat_kematian" value="{{ old('tempat_kematian') }}" placeholder="Masukkan Tempat Kematian">
									@error('tempat_kematian')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="tanggal_kematian" class="form-label">Tanggal Kematian</label>
									<input type="date" class="form-control @error('tanggal_kematian') is-invalid @enderror" id="tanggal_kematian" name="tanggal_kematian" value="{{ old('tanggal_kematian') }}">
									@error('tanggal_kematian')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="jam_kematian" class="form-label">Jam Kematian</label>
									<input type="time" class="form-control @error('jam_kematian') is-invalid @enderror" id="jam_kematian" name="jam_kematian" value="{{ old('jam_kematian') }}">
									@error('jam_kematian')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="hubungan_dengan_pelapor" class="form-label">Hubungan dengan Pelapor</label>
									<input type="text" class="form-control @error('hubungan_dengan_pelapor') is-invalid @enderror" id="hubungan_dengan_pelapor" name="hubungan_dengan_pelapor" value="{{ old('hubungan_dengan_pelapor') }}" placeholder="Masukkan Hubungan dengan Pelapor">
									@error('hubungan_dengan_pelapor')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="surat_kelahiran" tabindex="-1" aria-labelledby="surat_kelahiranLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="updateDataModalLabel">Surat Kelahiran</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="POST" action="{{ route('surat_kelahiran.store') }}">
								@csrf
							
								<div class="mb-3">
									<label for="nik_ayah" class="form-label">NIK Ayah</label>
									<input type="text" class="form-control @error('nik_ayah') is-invalid @enderror" id="nik_ayah" name="nik_ayah" value="{{ old('nik_ayah') }}" placeholder="Masukkan NIK Ayah">
									@error('nik_ayah')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="nik_ibu" class="form-label">NIK Ibu</label>
									<input type="text" class="form-control @error('nik_ibu') is-invalid @enderror" id="nik_ibu" name="nik_ibu" value="{{ old('nik_ibu') }}" placeholder="Masukkan NIK Ibu">
									@error('nik_ibu')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="nik_pelapor" class="form-label">NIK Pelapor</label>
									<input type="text" class="form-control @error('nik_pelapor') is-invalid @enderror" id="nik_pelapor" name="nik_pelapor" value="{{ Auth::user()->nik }}" placeholder="Masukkan NIK Pelapor" readonly disabled>
									@error('nik_pelapor')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="nama_anak" class="form-label">Nama Anak</label>
									<input type="text" class="form-control @error('nama_anak') is-invalid @enderror" id="nama_anak" name="nama_anak" value="{{ old('nama_anak') }}" placeholder="Masukkan Nama Anak">
									@error('nama_anak')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
									<select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
										<option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
										<option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
									</select>
									@error('jenis_kelamin')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
									<input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir">
									@error('tempat_lahir')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
									<input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
									@error('tanggal_lahir')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="jam_lahir" class="form-label">Jam Lahir</label>
									<input type="time" class="form-control @error('jam_lahir') is-invalid @enderror" id="jam_lahir" name="jam_lahir" value="{{ old('jam_lahir') }}">
									@error('jam_lahir')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<div class="mb-3">
									<label for="hubungan_sebagai" class="form-label">Hubungan dengan Pelapor</label>
									<input type="text" class="form-control @error('hubungan_sebagai') is-invalid @enderror" id="hubungan_sebagai" name="hubungan_sebagai" value="{{ old('hubungan_sebagai') }}" placeholder="Masukkan Hubungan dengan Pelapor">
									@error('hubungan_sebagai')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
							
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>
							
							
						</div>
					</div>
				</div>
			</div>

			
		</div>

{{-- LIHAT SEMUA DATA --}}
<div class="modal fade" id="LihatData" tabindex="-1" aria-labelledby="LihatDataLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="LihatDataLabel">Liat Data Pengajuan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				{{-- Pengajuan Data Kependudukan --}}
				<div class="container mb-5 shadow py-3 rounded">
					<h4>Pengajuan Data Kependudukan</h4>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Data yang diajukan</th>
								<th>Pesan pengajuan</th>
								<th>Tanggal pengajuan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data_pengajuan_kependudukan_by as $i=>$penduduk)
							<tr>
								<td>{{ 1+$i }}</td>
								<td>{{ $penduduk->request_data }}</td>
								<td>{{ $penduduk->pesan_pengajuan }}</td>
								<td>{{ $penduduk->created_at->format('d-M-Y') }}</td>
								<td class="text-center">
									@if($penduduk->status == 'pending')
										<span class="badge bg-warning">
											{{ $penduduk->status }}
										</span>
									@endif
									@if($penduduk->status == 'accept')
										<span class="badge bg-success">
											{{ $penduduk->status }}
										</span><br>
										<small style="font-size:10px;">
											Pada tanggal : {{ $penduduk->updated_at->format('d-M-Y') }}
										</small>
									@endif
								</td>
								<td class="text-center">
									<form action="{{ route('pengajuan_penduduk.destroy', $penduduk->id) }}" method="POST" style="display: inline;">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger">
											@if($penduduk->status == 'pending')
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
								<td colspan="6">
									<div class="alert alert-warning text-center">
										<p>
											<strong>Belum</strong> ada pengajuan 
										</p>
										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateDataModal">Buat Pengajuan 
											<i class="bi bi-send-plus"></i> 
										</button>
									</div>
								</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>

				{{-- Pengajuan Surat --}}
				<div class="container mb-5 shadow py-3 rounded">
					<h4>Pengajuan Surat Kematian</h4>
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
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data_surat_kematian_by as $i=>$data)
							<tr>
								<td>{{ 1+$i }}</td>
								<td>{{ $data->tempat_kematian }},{{ $data->tanggal_kematian }}</td>
								<td>{{ $data->nik }}</td>
								<td>{{ $data->nik_pelapor }}</td>
								<td>{{ $data->jam_kematian }}</td>
								<td>{{ $data->created_at->format('d-M-Y') }}</td>
								<td class="text-center">
									@if($data->status == 'pending')
										<span class="badge bg-warning">
											{{ $data->status }}
										</span>
									@endif
									@if($data->status == 'accept')
										<span class="badge bg-success">
											{{ $data->status }}
										</span><br>
										<small style="font-size:10px;">
											Pada tanggal : {{ $data->updated_at->format('d-M-Y') }}
										</small>
									@endif
									@if($data->file)
										<a target="_blank" href="{{ asset('storage/surat_kematian/' . $data->file) }}" class="btn btn-primary my-2"><i class="bi bi-download"></i> Download Surat</a>
									@else
										<p class="text-center">-</p>
									@endif
								</td>
								<td class="text-center">
							
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
								<td colspan="8">
									<div class="alert alert-warning text-center">
										<p>
											<strong>Belum</strong> ada pengajuan 
										</p>
										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#surat_kematian">Buat Pengajuan 
											<i class="bi bi-send-plus"></i> 
										</button>
									</div>
								</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>

				{{-- Pengajuan Surat Kelahiran--}}
				<div class="container mb-5 shadow py-3 rounded">
					<h4>Pengajuan Surat kelahiran</h4>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Tanggal dan tempat kelahiran</th>
								<th>Nama Anak</th>
								<th>Jenis Kelamin</th>
								<th>Jam kelahiran</th>
								<th>Tanggal pengajuan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($data_surat_kelahiran_by as $i=>$data)
							<tr>
								<td>{{ 1+$i }}</td>
								<td>{{ $data->tempat_lahir }},{{ $data->tanggal_lahir }}</td>
								<td>{{ $data->nama_anak }}</td>
								<td>{{ $data->jenis_kelamin }}
								</td>
								<td>{{ $data->jam_lahir }}</td>
								<td>{{ $data->created_at->format('d-M-Y') }}</td>
								<td class="text-center">
									@if($data->status == 'pending')
										<span class="badge bg-warning">
											{{ $data->status }}
										</span>
									@endif
									@if($data->status == 'accept')
										<span class="badge bg-success">
											{{ $data->status }}
										</span><br>
										<small style="font-size:10px;">
											Pada tanggal : {{ $data->updated_at->format('d-M-Y') }}
										</small>
									@endif
									@if($data->file)
										<a target="_blank" href="{{ asset('storage/surat_kelahiran/' . $data->file) }}" class="btn btn-primary my-2"><i class="bi bi-download"></i> Download Surat</a>
									@else
										<p class="text-center">-</p>
									@endif
								</td>
								<td class="text-center">
							
									<form action="{{ route('surat_kelahiran.destroy', $data->id) }}" method="POST" style="display: inline;">
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
								<td colspan="8">
									<div class="alert alert-warning text-center">
										<p>
											<strong>Belum</strong> ada pengajuan 
										</p>
										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#surat_kelahiran">Buat Pengajuan 
											<i class="bi bi-send-plus"></i> 
										</button>
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

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Data Penduduk</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $data_pribadi->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $data_pribadi->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $data_pribadi->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $data_pribadi->tanggal_lahir }}<br><small>(yyyy/mm/dd)</small></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $data_pribadi->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Kartu Keluarga (KK)</th>
                                <td>{{ $data_pribadi->no_kk }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $data_pribadi->alamat }}</td>
                            </tr>
                            <tr>
                                <th>RT</th>
                                <td>{{ $data_pribadi->rt }}</td>
                            </tr>
                            <tr>
                                <th>RW</th>
                                <td>{{ $data_pribadi->rw }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $data_pribadi->agama }}</td>
                            </tr>
                            <tr>
                                <th>Status Perkawinan</th>
                                <td>{{ $data_pribadi->status_perkawinan }}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>{{ $data_pribadi->pendidikan }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $data_pribadi->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>{{ $data_pribadi->golongan_darah }}</td>
                            </tr>
                            <tr>
                                <th>Kewarganegaraan</th>
                                <td>{{ $data_pribadi->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $data_pribadi->keterangan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
	</div>
</div>

@endsection