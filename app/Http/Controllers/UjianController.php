<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ujian::query()
        ->with('MataPelajaran')
        ->get();

 
        
        return view('ujian.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('ujian.create',compact(['mapel']));
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
            'nama_ujian' => 'required',
            'mata_pelajaran_id' => 'required',
            'tanggal_ujian' => 'required',
        ]);
  
        Ujian::create($data);
   
        return redirect()->route('ujian.index')
                        ->with('status','Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        $mapel = MataPelajaran::all();
        return view('ujian.edit',compact(['ujian','mapel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        $data = $request->validate([
            'nama_ujian' => 'required',
            'mata_pelajaran_id' => 'required',
            'tanggal_ujian' => 'required',
        ]);
  
        $ujian->update($data);
   
        return redirect()->route('ujian.index')
                        ->with('status','Siswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        try{
            $ujian->delete();
            return back()->with('status', 'Berhasil Hapus ujian');
        }catch (\Exception $e) {
            return back()->with('status', 'Gagal hapus ujian Karena sudah memiliki relasi');
        }
    }
}
