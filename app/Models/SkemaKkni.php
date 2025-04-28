<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaKkni extends Model
{
    use HasFactory;

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
