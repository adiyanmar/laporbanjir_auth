@extends('layouts.app')
@section('title', 'Lapor Banjir')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Form Lapor Banjir</div>
            <div class="card-body">
                <form method="POST" action="{{ route('laporan.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Pelapor</label>
                        <input type="text" name="nama_pelapor" class="form-control" value="{{ old('nama_pelapor') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tinggi Air (cm)</label>
                        <input type="number" name="tinggi_air" class="form-control" value="{{ old('tinggi_air') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection