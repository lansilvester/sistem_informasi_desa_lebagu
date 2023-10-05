@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Ubah Password</h1>

    @if(session('success_update_password'))
    <div class="alert alert-success">
        {{ session('success_update_password') }}
    </div>
    @endif
    <form method="POST" action="{{ route('penduduk.update_password', Auth::user()->id) }}">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="current_password" class="form-label">Password Lama</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
    
    
</div>
@endsection
