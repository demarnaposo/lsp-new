<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaUnjukKerja;
use Illuminate\Support\Facades\DB;

class KriteriaUnjukKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = "Kriteria Unjuk Kerja";

        $query = DB::table('kriteria_unjukkerjas')
            ->select('kriteria_unjukkerjas.id', 'kriteria_unjukkerjas.kriteria', 'kriteria_unjukkerjas.kriteria_pasif', 'elemen_kompetensis.elemen_kompetensi')
            ->join('elemen_kompetensis', 'elemen_kompetensis.id', '=', 'kriteria_unjukkerjas.elemenkompetensi_id')
            ->where('kriteria_unjukkerjas.elemenkompetensi_id', $id);

        $kriteria = (clone $query)->get();

        dd($kriteria);
        // $total = (clone $query)->count();

        return view('kriteria-unjukkerja.index', compact('title',));
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
    public function show(KriteriaUnjukKerja $kriteriaUnjukKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KriteriaUnjukKerja $kriteriaUnjukKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KriteriaUnjukKerja $kriteriaUnjukKerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KriteriaUnjukKerja $kriteriaUnjukKerja)
    {
        //
    }
}
