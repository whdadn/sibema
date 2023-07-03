<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\pegawai;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        return view('index')->with('berita', $berita);
    }

    public function show()
    {
        $berita = berita::with('pegawai')->paginate(10);

        return view('dashboard.menuAdmin.beritaUtama', compact('berita'));
    }

    public function create(berita $berita)
    {
        return view('dashboard.menuAdmin.tambahBeritaUtama');
    }

    public function store(berita $berita, Request $request)
    {
        $pegawai = auth()->user()->pegawai;

        $berita = new berita;
        $berita->judul_berita = $request->judul;
        $berita->isi_berita = $request->berita;
        $berita->excerpt = Str::limit($request->berita, 200);
        if ($request->file('gambar')) {
            $berita->gambar = $request->file('gambar')->store('Gambar');
        }

        $berita->save();

        return redirect('/dashboardAdmin/beritaUtama');
    }

    public function edit(berita $berita)
    {
        $berita = berita::find($berita->id_berita);

        return view('dashboard.menuAdmin.perbaruiberitaUtama', compact('berita'));
    }

    public function update(berita $berita, Request $request)
    {
        $berita = berita::find($berita->id_berita);
        $berita->judul_berita = $request->judul;
        $berita->isi_berita = $request->berita;
        $berita->excerpt = Str::limit($request->berita, 200);
        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $berita->gambar = $request->file('gambar')->store('Gambar');
        }

        $berita->save();

        return redirect('/dashboardAdmin/beritaUtama');
    }

    public function destroy(berita $berita, Request $request)
    {
        $berita = berita::find($berita->id_berita);

        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
        }

        $berita->delete();
        return redirect('/dashboardAdmin/beritaUtama');
    }
}
