<?php

namespace Database\Seeders;

use App\Models\Presensi;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PresensiSeeder extends Seeder
{
    public function run(): void
    {
        $pegawaiMap = Pegawai::pluck('id', 'nip');

        $presensis = [
            ['tanggal' => '2018-01-02', 'nip' => 11234, 'jam_masuk' => '08:10:00', 'jam_pulang' => '17:40:00'],
            ['tanggal' => '2018-01-02', 'nip' => 11235, 'jam_masuk' => '08:00:00', 'jam_pulang' => '17:07:00'],
            ['tanggal' => '2018-01-02', 'nip' => 11236, 'jam_masuk' => '07:00:00', 'jam_pulang' => '16:30:00'],
            ['tanggal' => '2018-01-03', 'nip' => 11234, 'jam_masuk' => '07:00:00', 'jam_pulang' => '16:00:00'],
            ['tanggal' => '2018-01-03', 'nip' => 11235, 'jam_masuk' => '07:00:00', 'jam_pulang' => '16:30:00'],
            ['tanggal' => '2018-01-03', 'nip' => 11236, 'jam_masuk' => '07:15:00', 'jam_pulang' => '17:30:00'],
            ['tanggal' => '2018-01-04', 'nip' => 11234, 'jam_masuk' => '07:20:00', 'jam_pulang' => '16:20:00'],
        ];

        foreach ($presensis as $data) {
            Presensi::create([
                'id' => Str::uuid(),
                'tanggal' => $data['tanggal'],
                'pegawai_id' => $pegawaiMap[$data['nip']],
                'jam_masuk' => $data['jam_masuk'],
                'jam_pulang' => $data['jam_pulang'],
            ]);
        }
    }
}
