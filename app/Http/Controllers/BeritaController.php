<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        return view('index')->with('berita', $berita);
    }
}
