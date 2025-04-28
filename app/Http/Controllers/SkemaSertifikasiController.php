<?php

namespace App\Http\Controllers;

use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class SkemaSertifikasiController extends Controller
{
    public function index() {

        $title = "Skema Sertifikasi";

        $skema = SkemaSertifikasi::all();

        // dd($skema->kode_skema);

        return view("skema-sertifikasi.index", compact("title", "skema"));
        
    }
}
