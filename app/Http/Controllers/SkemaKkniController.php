<?php

namespace App\Http\Controllers;

use App\Models\SkemaKkni;
use Illuminate\Http\Request;

class SkemaKkniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Skema Sertifikasi Profesi";

        $skema = SkemaKkni::all();

        // dd($skema);

        return view("skema-kkni.index", compact("title", "skema"));
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
