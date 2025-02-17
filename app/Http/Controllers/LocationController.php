<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\SubDistrict;

class LocationController extends Controller
{
    public function getProvinces()
    {
        return response()->json(Province::all());
    }

    public function getRegencies($province_id)
    {
        return response()->json(Regency::where('province_id', $province_id)->get());
    }

    public function getDistricts($regency_id)
    {
        return response()->json(District::where('regency_id', $regency_id)->get());
    }

    public function getSubDistricts($district_id)
    {
        return response()->json(SubDistrict::where('district_id', $district_id)->get());
    }
}
