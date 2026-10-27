@extends('layouts.app')
@section('title', 'Profil Petugas')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Profil Petugas</div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Akun dibuat:</strong>
                    {{ Auth::user()->created_at->translatedFormat('d F Y, H:i') }}
                    ({{ Auth::user()->created_at->diffForHumans() }})
                </p>
            </div>
        </div>
    </div>
</div>
@endsection