<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $divisiMap = Divisi::pluck('id', 'kode_divisi');

        $pegawais = [
            ['nip' => 11234, 'nama' => 'Arini Nikita', 'alamat' => 'Jl. Dedali Putih 5A Tangerang', 'tanggal_lahir' => '1988-01-02', 'kode_divisi' => 'S1'],
            ['nip' => 11235, 'nama' => 'Toni Purana', 'alamat' => 'Jl. Temenggung 21B Jakarta Selatan', 'tanggal_lahir' => '1983-04-04', 'kode_divisi' => 'S2'],
            ['nip' => 11236, 'nama' => 'Gigih Prayitno', 'alamat' => 'Jl. Sidopekso 65 Bandung', 'tanggal_lahir' => '1985-11-08', 'kode_divisi' => 'S3'],
            ['nip' => 11237, 'nama' => 'Hilda Rahmawa', 'alamat' => 'Jl. Mendut 12 Bogor', 'tanggal_lahir' => '1986-11-01', 'kode_divisi' => 'S2'],
            ['nip' => 11238, 'nama' => 'Miftachul Fauza', 'alamat' => 'Jl. Borobudur 1 Bogor', 'tanggal_lahir' => '1984-09-05', 'kode_divisi' => 'S1'],
            ['nip' => 11239, 'nama' => 'Katrilia Tirta', 'alamat' => 'Jl. Kenanga 21 Jakarta Timur', 'tanggal_lahir' => '1984-07-05', 'kode_divisi' => 'S1'],
        ];

        foreach ($pegawais as $data) {
            Pegawai::create([
                'id' => Str::uuid(),
                'nip' => $data['nip'],
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'divisi_id' => $divisiMap[$data['kode_divisi']],
            ]);
        }
    }
}
