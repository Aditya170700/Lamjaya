<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'T_KELURAHAN';
    protected $primaryKey = 'kode';
    protected $casts = [
        'kode' => 'string',
    ];
    protected $fillable = [
        'kode',
        'nama',
        'kode_kecamatan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode');
    }
}
