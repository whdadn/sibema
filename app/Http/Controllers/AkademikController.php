<?php

namespace App\Http\Controllers;

use App\Models\akademik;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menuMhs.tambahDokAkademik');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $pegawai = auth()->user()->pegawai;

        $validator = Validator::make($request->all(), [
            'sem1' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sem2' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sem3' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sem4' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sem5' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sem6' => 'required|file|mimes:jpeg,jpg,png,pdf|max:2048',
            'sp' => 'file|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validateData['khs_semester_1'] = $request->file('sem1')->store('KHSSem1');
        $validateData['khs_semester_2'] = $request->file('sem2')->store('KHSSem2');
        $validateData['khs_semester_3'] = $request->file('sem3')->store('KHSSem3');
        $validateData['khs_semester_4'] = $request->file('sem4')->store('KHSSem4');
        $validateData['khs_semester_5'] = $request->file('sem5')->store('KHSSem5');
        $validateData['khs_semester_6'] = $request->file('sem6')->store('KHSSem6');
        $validateData['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $validateData['id_pegawai'] = null;

        if ($request->hasFile('sp')) {
            $validateData['lembar_sp'] = $request->file('sp')->store('lembarSP');
        } else {
            $validateData['lembar_sp'] = null;
        }

        $akademik = new akademik;
        $akademik->khs_semester_1 = $validateData['khs_semester_1'];
        $akademik->khs_semester_2 = $validateData['khs_semester_2'];
        $akademik->khs_semester_3 = $validateData['khs_semester_3'];
        $akademik->khs_semester_4 = $validateData['khs_semester_4'];
        $akademik->khs_semester_5 = $validateData['khs_semester_5'];
        $akademik->khs_semester_6 = $validateData['khs_semester_6'];
        $akademik->lembar_sp = $validateData['lembar_sp'];
        $akademik->id_mahasiswa = $mahasiswa->id_mahasiswa;

        // Tambahkan kondisi untuk mengatur id_pegawai hanya diisi jika pegawai ada
        if ($pegawai) {
            $akademik->id_pegawai = $pegawai->id_pegawai;
        } else {
            $akademik->id_pegawai = null;
        }

        $akademik->save();

        return redirect('/dashboardMhs/uploadAkademik');
    }

    /**
     * Display the specified resource.
     */
    public function show(akademik $akademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(akademik $akademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, akademik $akademik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(akademik $akademik)
    {
        $akademik->delete();

        if ($akademik->khs_semester_1) {
            Storage::delete($akademik->khs_semester_1);
        }

        if ($akademik->khs_semester_2) {
            Storage::delete($akademik->khs_semester_2);
        }

        if ($akademik->khs_semester_3) {
            Storage::delete($akademik->khs_semester_3);
        }

        if ($akademik->khs_semester_4) {
            Storage::delete($akademik->khs_semester_4);
        }

        if ($akademik->khs_semester_5) {
            Storage::delete($akademik->khs_semester_5);
        }

        if ($akademik->khs_semester_6) {
            Storage::delete($akademik->khs_semester_6);
        }

        if ($akademik->lembar_sp) {
            Storage::delete($akademik->lembar_sp);
        }

        return redirect('/dashboardMhs/uploadAkademik');
    }

    public function showAkademik(mahasiswa $mahasiswa, akademik $akademik)
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        $akademik = akademik::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();

        return view('dashboard.menuMhs.uploadAkademik', compact('akademik', 'mahasiswa'));
    }

    public function viewAkademik(akademik $akademik)
    {
        $akademik = akademik::find($akademik->id_akademik);

        return view('dashboard.menuMhs.viewAkademik', compact('akademik'));
    }
}
