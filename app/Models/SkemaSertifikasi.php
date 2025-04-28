<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaSertifikasi extends Model
{
    use HasFactory;

    // Karena nama table dengan nama model beda jadi dibuat spesifik nama tabel nya
    // protected $table = 'skema_kkni';

    protected $fillable = [
        'kode_skema',
        'judul',
        'judul_eng',
        'jenis_skema',
        'skema_induk',
        'areakerja',
        'areakerja_eng',
        'kode_sektor',
        'kbli',
        'kbji',
        'jenjang',
        'id_skkni',
        'keterangan_bukti',
        'apl02',
        'file',
        'kodeskema_bnsp',
        'aktif'
    ];
}
