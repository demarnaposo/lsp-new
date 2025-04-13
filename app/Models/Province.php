<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    // Table Provinsi

    protected $fillable = ['name'];

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
