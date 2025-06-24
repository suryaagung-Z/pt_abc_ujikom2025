<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DivisiSeeder extends Seeder
{
    public function run(): void
    {
        $divisis = [
            ['kode_divisi' => 'S1', 'nama_divisi' => 'Gudang', 'pimpinan_divisi' => 'Beni Permana, SE'],
            ['kode_divisi' => 'S2', 'nama_divisi' => 'Produksi', 'pimpinan_divisi' => 'Syaiful Bachri, ST'],
            ['kode_divisi' => 'S3', 'nama_divisi' => 'HRD', 'pimpinan_divisi' => 'Dr. Anggit Darmawan'],
        ];

        foreach ($divisis as $data) {
            Divisi::create([
                'id' => Str::uuid(),
                'kode_divisi' => $data['kode_divisi'],
                'nama_divisi' => $data['nama_divisi'],
                'pimpinan_divisi' => $data['pimpinan_divisi'],
            ]);
        }
    }
}
