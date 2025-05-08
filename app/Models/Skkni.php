<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skkni extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_skkni',
        'nama',
        'jenis_standard',
        'sektor',
        'subsektor',
        'legalitas',
        'penyusun',
        'file',
    ];
}
