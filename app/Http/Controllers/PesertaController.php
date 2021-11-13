<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peserta::with('ujian','siswa')->get();
        return view('peserta.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $ujian = Ujian::all();
        return view('peserta.create',compact(['siswa','ujian']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ujian_id' => 'required',
            'nis' => 'required',
            'nilai' => 'bail'
        ]);

        Peserta::create($data);

        return redirect()->route('peserta.index')
                        ->with('status','peserta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $pesertum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $pesertum)
    {
        return view('peserta.edit',compact(['pesertum']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $pesertum)
    {
        $data = $request->validate([
            'ujian_id' => 'required',
            'nis' => 'required',
            'nilai' => 'bail'
        ]);

        $pesertum->update($data);

        return redirect()->route('peserta.index')
                        ->with('status','peserta updaterd successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $pesertum)
    {
        try{
            $pesertum->delete();
            return back()->with('status', 'Berhasil Hapus peserta');
        }catch (\Exception $e) {
            return back()->with('status', 'Gagal hapus peserta Karena sudah memiliki relasi');
        }
    }

    public function lulus()
    {
        $data = Peserta::where('nilai', '>=', 75)->get();
        return response($data);
    }

    public function tidaklulus()
    {
        $data = Peserta::where('nilai', '<', 75)->get();
        return response($data);
    }
}
