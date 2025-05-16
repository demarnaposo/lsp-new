<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElemenKompetensi;
use Illuminate\Support\Facades\DB;

class ElemenKompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $title = 'Elemen Kompetensi';

        $query = DB::table('elemen_kompetensis')
            ->select('elemen_kompetensis.id', 'elemen_kompetensis.elemen_kompetensi', 'unit_kompetensis.kode_unit', 'unit_kompetensis.judul', 'unit_kompetensis.judul_eng')
            ->join('unit_kompetensis', 'elemen_kompetensis.unitkompetensi_id', '=', 'unit_kompetensis.id')
            ->where('elemen_kompetensis.unitkompetensi_id', $id);

        $elemen = (clone $query)->get();
        $total = (clone $query)->count();

        // dd($elemen);




        return view('elemen-kompetensi.index', compact('title', 'elemen', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = 'Elemen Kompetensi';



        return view('elemen-kompetensi.create', compact('title', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'elemen_kompetensi' => 'required',
        ], [
            'elemen_kompetensi.required' => 'Elemen Kompetensi belum diisi!',
        ]);


        $elemen = new ElemenKompetensi();

        $elemen->elemen_kompetensi = $request->input('elemen_kompetensi');
        $elemen->unitkompetensi_id = $id;

        $elemen->save();

        return redirect()->route('elemen-kompetensi.index', $id)->with('success', 'Elemen Kompetensi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ElemenKompetensi $elemenKompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElemenKompetensi $elemenKompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElemenKompetensi $elemenKompetensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = DB::table('elemen_kompetensis')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Elemen Kompetensi berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus elemen kompetensi.');
        }
    }
}
