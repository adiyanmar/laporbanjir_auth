<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // PUBLIK: form lapor
    public function create()
    {
        return view('laporan.create');
    }

    // PUBLIK: simpan laporan warga
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:100'],
            'lokasi'       => ['required', 'string', 'max:255'],
            'tinggi_air'   => ['nullable', 'integer', 'min:0'],
            'deskripsi'    => ['required', 'string'],
        ]);

        Laporan::create($data);

        return back()->with('success', 'Laporan berhasil dikirim. Terima kasih!');
    }

    // PETUGAS: daftar laporan
    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    // PETUGAS: hapus laporan
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}