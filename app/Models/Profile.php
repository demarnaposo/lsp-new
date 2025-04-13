<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    // Tabel Profil Asesi

    protected $fillable = ['user_id', 'no_ktp', 'name', 'place_birth', 'date_birth', 'gender', 'universitas', 'jurusan', 'tahun', 'pendidikan_id', 'kebangsaan_id', 'phone', 'address', 'province_id', 'regency_id', 'district_id', 'sub_district_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function kebangsaan()
    {
        return $this->belongsTo(Kebangsaan::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function sub_district()
    {
        return $this->belongsTo(SubDistrict::class);
    }


}
