<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'no_ktp', 'name', 'phone', 'address', 'province_id', 'regency_id', 'district_id', 'sub_district_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
