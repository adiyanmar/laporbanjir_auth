@extends('layouts.app')
@section('title', 'Daftar Laporan')
@section('content')
<div class="card">
    <div class="card-header">Daftar Laporan Banjir</div>
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th><th>Pelapor</th><th>Lokasi</th><th>Tinggi Air</th>
                    <th>Deskripsi</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama_pelapor }}</td>
                    <td>{{ $l->lokasi }}</td>
                    <td>{{ $l->tinggi_air ? $l->tinggi_air.' cm' : '-' }}</td>
                    <td>{{ $l->deskripsi }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $l->status }}</span></td>
                    <td>
                        <form method="POST" action="{{ route('laporan.destroy', $l) }}"
                              onsubmit="return confirm('Hapus laporan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection