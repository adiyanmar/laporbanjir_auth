<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    // Halaman profil petugas yang sedang login
    public function index()
    {
        return view('profil');
    }
}