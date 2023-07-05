<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $tugas_akhir = $mahasiswa->tugas_akhir()->get();
        $keuangan = $mahasiswa->keuangan()->get();
        $perpustakaan = $mahasiswa->perpustakaan()->get();
        $akademik = $mahasiswa->akademik()->get();
        return view('dashboard.menuMhs.dasboardMhs', compact('mahasiswa', 'tugas_akhir', 'keuangan', 'perpustakaan', 'akademik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menuMhs.tambahDokRegis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $pegawai = auth()->user()->pegawai;

        $validateData['dokumen_keuangan'] = $request->file('registrasi')->store('dokumenRegis');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = null;

        $keuangan = new keuangan;
        $keuangan->dokumen_keuangan = $validateData['dokumen_keuangan'];

        $keuangan->id_mahasiswa = $mahasiswa->id_mahasiswa;

        if ($pegawai) {
            $keuangan->id_pegawai = $pegawai->id_pegawai;
        } else {
            $keuangan->id_pegawai = null;
        }

        $keuangan->save();

        return redirect('/dashboardMhs/uploadRegis');
    }

    /**
     * Display the specified resource.
     */
    public function show(keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keuangan $keuangan)
    {
        if ($keuangan->dokumen_keuangan) {
            Storage::delete($keuangan->dokumen_keuangan);
        }

        $keuangan->delete();
        return redirect('/dashboardMhs/uploadRegis');
    }

    public function showRegis(mahasiswa $mahasiswa)
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $keuangan = keuangan::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();

        return view('dashboard.menuMhs.uploadRegis', compact('keuangan', 'mahasiswa'));
    }

    public function viewRegis(keuangan $regis)
    {
        $regis = keuangan::find($regis->id_keuangan);

        return view('dashboard.menuMhs.viewRegis', compact('regis'));
    }
}
