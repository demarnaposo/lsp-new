<?php

namespace App\Http\Controllers;

use App\Models\Skkni;
use Illuminate\Http\Request;

class SkkniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Standar Kompetensi LSP";

        $skkni = Skkni::all();

        // dd($skkni);

        return view('skkni.index', compact('title', 'skkni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = 'Standar Kompetensi LSP';




        return view('skkni.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'jenis_standar' => 'required',
            'nama' => 'required',
            'penyusun' => 'required',
            'no_skkni' => 'required',
            'legalitas' => 'required',
            'sektor' => 'required',
            'subsektor'=> 'required',
            'file' => 'required|mimes:pdf|max:2048', // max 2MB
        ], [
            'jenis_standar.required' => 'Jenis Standar belum dipilih!',
            'nama.required' => 'Nama Standar belum diisi!',
            'penyusun.required' => 'Penerbit / Kementerian belum diisi!',
            'no_skkni.required' => 'Nomor SKKNI belum diisi!',
            'legalitas.required' => 'Legalitas belum diisi!',
            'sektor.required'=> 'Sektor belum diisi!',
            'subsektor.required'=> 'Sub Sektor belum diisi!',
            'file.required' => 'Dokumen belum dipilih!',
        ]);

        $skkni = new Skkni();

        $skkni->jenis_standard = $request->input('jenis_standar');
        $skkni->nama = $request->input('nama');
        $skkni->penyusun = $request->input('penyusun');
        $skkni->no_skkni = $request->input('no_skkni');
        $skkni->legalitas = $request->input('legalitas');
        $skkni->sektor = $request->input('sektor');
        $skkni->subsektor = $request->input('subsektor');

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/file/'), $filename);

            $skkni->file = $filename;

            $skkni->save();
        }

        $skkni->save();

        return redirect()->route('skkni.index')->with('success', 'Skkni berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
