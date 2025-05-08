<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKompetensi extends Model
{
    use HasFactory;


    protected $fillable = [
        'kode_unit',
        'judul',
        'judul_eng',
        'jenis',
        'skemakkni_id',
        'skkni_id',
        'kelompok_id',
    ];
}
