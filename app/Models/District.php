<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    // Tabel Kecamatan

    protected $fillable = ['name', 'regency_id'];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class);
    }
}
