<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'kode_divisi',
        'nama_divisi',
        'pimpinan_divisi',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'divisi_id');
    }
}
