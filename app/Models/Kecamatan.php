<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'T_KECAMATAN';
    protected $primaryKey = 'kode';
    protected $casts = [
        'kode' => 'string',
    ];
    protected $fillable = [
        'kode',
        'nama',
    ];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kode_kecamatan', 'kode');
    }
}
