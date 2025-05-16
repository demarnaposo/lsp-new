<?php

namespace App\Http\Controllers;

use App\Models\UnitKompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitKompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $title = "Unit Kompetensi Sertifikasi Profesi";


        $unit = DB::table('unit_kompetensis')
            ->join('skema_kknis', 'unit_kompetensis.skemakkni_id', '=', 'skema_kknis.id')
            ->join('skknis', 'unit_kompetensis.skkni_id', '=', 'skknis.id')
            ->where('unit_kompetensis.skemakkni_id', $id)
            ->select(
                'unit_kompetensis.id',
                'unit_kompetensis.kode_unit',
                'unit_kompetensis.judul',
                'unit_kompetensis.judul_eng',
                'unit_kompetensis.jenis',
                'skema_kknis.kode_skema',
                'skema_kknis.judul as judul_skema',
                'skknis.no_skkni',
                'skknis.nama'
            )
            ->get();


        $countElemen = DB::table('elemen_kompetensis')
            ->select('unitkompetensi_id', DB::raw('COUNT(*) as total'))
            ->groupBy('unitkompetensi_id')
            ->pluck('total', 'unitkompetensi_id');


            // dd($countElemen);


        return view('unit-kompetensi.index', compact('title', 'unit', 'id', 'countElemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $title = "Unit Kompetensi Sertifikasi Profesi";

        $skema = DB::table('skema_kknis')->where('id', $id)->select('id', 'judul')->first();

        $skkni = DB::table('skknis')->select('id', 'no_skkni', 'nama')->get();

        // dd($skkni);



        return view("unit-kompetensi.create", compact("title", "skema", "skkni"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // dd($id);
        // dd($request->all());

        $request->validate([

            'kode_unit' => 'required',
            'judul' => 'required',
            'judul_eng' => 'required',
            'jenis' => 'required',
            'skkni_id' => 'required',
        ]);


        // $skema = DB::table('skema_kknis')->where('id', $id)->select('id', 'judul')->first();

        // dd($skema);




        $unit = new UnitKompetensi();

        $unit->kode_unit = $request->input('kode_unit');
        $unit->judul = $request->input('judul');
        $unit->judul_eng = $request->input('judul_eng');
        $unit->jenis = $request->input('jenis');
        $unit->skemakkni_id = $id;
        $unit->skkni_id = $request->input('skkni_id');



        $unit->save();


        return redirect()->route('unit-kompetensi.index', $id)->with('success', 'Unit Kompetensi berhasil ditambah!');
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
