<?php

namespace App\Http\Controllers;

use App\Models\SkemaKkni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkemaKkniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Skema Sertifikasi Profesi";

        $skema = SkemaKkni::all();



        $getunit = DB::table('skknis')
            ->select('skknis.no_skkni', 'skknis.nama', 'skknis.file', 'skema_kknis.id as skema_id')
            ->distinct()
            ->join('unit_kompetensis', 'skknis.id', '=', 'unit_kompetensis.skkni_id')
            ->join('skema_kknis', 'unit_kompetensis.skemakkni_id', '=', 'skema_kknis.id')
            ->whereIn('skema_kknis.id', $skema->pluck('id'))
            ->get()
            ->groupBy('skema_id');





            // dd($getunit);
        // dd($unitCount);

        return view('skema-kkni.index', compact('title', 'skema', 'getunit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Data Skema";




        return view("skema-kkni.create", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([

            'kode_skema' => 'required',
            'judul' => 'required',
            'judul_eng' => 'required',
            'jenis_skema' => 'required',
            'skema_induk' => 'required',
            'areakerja' => 'required',
            'areakerja_eng' => 'required',
            'kode_sektor' => 'required',
            'kbli' => 'required',
            'kbji' => 'required',
            'jenjang' => 'required',
            'keterangan_bukti' => 'required',
            'apl02' => 'required',
            'aktif' => 'required',
            'file' => 'required|mimes:pdf|max:2048', // max 2MB
        ], [
            'kode_skema.required' => 'Kode Skema belum diisi!',
            'judul.required' => 'Judul Skema belum diisi!',
            'judul_eng.required' => 'Judul Skema belum diisi',
            'jenis_skema.required' => 'Jenis Skema belum dipilih!',
            'skema_induk.required' => 'Skema Induk belum dipilih!',
            'areakerja.required' => 'Bidang / Area Kerja belum diisi!',
            'areakerja_eng.required' => 'Bidang / Area Kerja belum diisi!',
            'kode_sektor.required' => 'Kode Sektor belum diisi!',
            'kbli.required' => 'Kode KBLI belum diisi!',
            'kbji.required' => 'Kode KBJI belum diisi!',
            'jenjang.required' => 'Jenjang / Level belum dipilih!',
            'keterangan_bukti.required' => 'Keterangan Bukti belum diisi!',
            'apl02.required' => 'Kedalaman Bukti belum dipilih!',
            'aktif.required' => 'Belum dipilih!',
            'file.required' => 'Dokumen belum dipilih!',
        ]);

        $skema = new SkemaKkni();

        $skema->kode_skema = $request->input('kode_skema');
        $skema->judul = $request->input('judul');
        $skema->judul_eng = $request->input('judul_eng');
        $skema->jenis_skema = $request->input('jenis_skema');
        $skema->skema_induk = $request->input('skema_induk');
        $skema->areakerja = $request->input('areakerja');
        $skema->areakerja_eng = $request->input('areakerja_eng');
        $skema->kode_sektor = $request->input('kode_sektor');
        $skema->kbli = $request->input('kbli');
        $skema->kbji = $request->input('kbji');
        $skema->jenjang = $request->input('jenjang');
        $skema->keterangan_bukti = $request->input('keterangan_bukti');
        $skema->apl02 = $request->input('apl02');
        $skema->aktif = $request->input('aktif');

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/file/'), $filename);

            $skema->file = $filename;


        }

        $skema->save();

        return redirect()->route('skema-kkni.index')->with('success', 'Skema berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkemaKkni $skemaKkni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkemaKkni $skemaKkni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkemaKkni $skemaKkni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkemaKkni $skemaKkni)
    {
        //
    }
}
