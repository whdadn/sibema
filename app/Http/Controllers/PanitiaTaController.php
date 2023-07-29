<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\pegawai;
use App\Models\tugas_akhir;
use Illuminate\Support\Facades\Auth;

class PanitiaTaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::with('akademik', 'tugas_akhir', 'user', 'jurusan')->paginate(10);

        return view('dashboard.menuPanitiaTa.dashboardPanitiaTa', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pegawai $pegawai)
    {
        $pegawai = auth()->user()->pegawai;

        return view('dashboard.menuPanitiaTa.profilePanitiaTa', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pegawai $pegawai)
    {
        $pegawai = pegawai::find($pegawai->id_pegawai);

        $pegawai->nama_pegawai = $request->nama;
        $pegawai->no_telepon_pegawai = $request->telpon;
        $pegawai->alamat_pegawai = $request->alamat;

        $pegawai->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editTa(tugas_akhir $tugas_akhir)
    {
        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);
        return view('dashboard.menuPanitiaTa.ubahStatusTa', compact('tugas_akhir'));
    }

    public function updateTa(tugas_akhir $tugas_akhir, Request $request)
    {
        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);
        $pegawaiId = Auth::user()->pegawai->id_pegawai;

        $tugas_akhir->status_ta = $request->ta;
        $tugas_akhir->rincian_ta = $request->rincian;
        $tugas_akhir->id_pegawai = $pegawaiId;
        $tugas_akhir->save();

        return redirect('/dashboardPanitiaTa');
    }

    public function viewTa(tugas_akhir $tugas_akhir)
    {
        $tugas_akhir = tugas_akhir::find($tugas_akhir->id_ta);

        return view('dashboard.menuPanitiaTa.viewTa', compact('tugas_akhir'));
    }
}
