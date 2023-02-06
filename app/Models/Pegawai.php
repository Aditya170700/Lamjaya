<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'T_PEGAWAI';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'kode_kelurahan',
        'kode_provinsi',
    ];
    protected $appends = [
        'jk_f',
        'tgl_lahir_f',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kode_kelurahan', 'kode');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'kode_provinsi', 'kode');
    }

    public function getJkFAttribute()
    {
        return $this->jk == 'L' ? 'Pria' : 'Wanita';
    }

    public function getTglLahirFAttribute()
    {
        return date('d-M-Y', strtotime($this->tgl_lahir));
    }
}
