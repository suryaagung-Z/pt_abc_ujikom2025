<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'tanggal_lahir',
        'divisi_id',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class, 'pegawai_id');
    }
}
