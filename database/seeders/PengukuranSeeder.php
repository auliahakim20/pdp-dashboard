<?php

namespace Database\Seeders;

use App\Models\Pengukuran;
use Illuminate\Database\Seeder;

class PengukuranSeeder extends Seeder
{
    public function run(): void
    {
        // kualitas: 0 = Buruk, 1 = Baik
        $data = [
            ['name' => 'Sampel 1',  'ph' => 7.2134, 'tds' => 215.40,  'turbidity' => 1.80,  'temperature' => 27.50, 'kualitas' => 1, 'tanggal' => '2026-09-01 08:15:20'],
            ['name' => 'Sampel 2',  'ph' => 7.0567, 'tds' => 248.10,  'turbidity' => 2.30,  'temperature' => 28.10, 'kualitas' => 1, 'tanggal' => '2026-09-01 13:19:13'],
            ['name' => 'Sampel 3',  'ph' => 5.2310, 'tds' => 1250.75, 'turbidity' => 26.40, 'temperature' => 30.20, 'kualitas' => 0, 'tanggal' => '2026-09-02 09:05:41'],
            ['name' => 'Sampel 4',  'ph' => 7.4821, 'tds' => 189.60,  'turbidity' => 1.20,  'temperature' => 26.80, 'kualitas' => 1, 'tanggal' => '2026-09-02 15:42:08'],
            ['name' => 'Sampel 5',  'ph' => 9.1045, 'tds' => 980.30,  'turbidity' => 18.90, 'temperature' => 31.00, 'kualitas' => 0, 'tanggal' => '2026-09-03 10:30:55'],
            ['name' => 'Sampel 6',  'ph' => 6.9873, 'tds' => 302.25,  'turbidity' => 3.10,  'temperature' => 27.90, 'kualitas' => 1, 'tanggal' => '2026-09-03 16:11:27'],
            ['name' => 'Sampel 7',  'ph' => 4.8560, 'tds' => 1580.00, 'turbidity' => 41.70, 'temperature' => 29.60, 'kualitas' => 0, 'tanggal' => '2026-09-04 07:48:36'],
            ['name' => 'Sampel 8',  'ph' => 7.3392, 'tds' => 176.85,  'turbidity' => 0.90,  'temperature' => 26.40, 'kualitas' => 1, 'tanggal' => '2026-09-04 12:25:02'],
            ['name' => 'Sampel 9',  'ph' => 8.9418, 'tds' => 1120.50, 'turbidity' => 33.20, 'temperature' => 30.80, 'kualitas' => 0, 'tanggal' => '2026-09-05 09:57:14'],
            ['name' => 'Sampel 10', 'ph' => 7.1126, 'tds' => 267.90,  'turbidity' => 2.70,  'temperature' => 27.20, 'kualitas' => 1, 'tanggal' => '2026-09-05 14:36:49'],
            ['name' => 'Sampel 11',  'ph' => 7.2134, 'tds' => 215.40,  'turbidity' => 1.80,  'temperature' => 27.50, 'kualitas' => 1, 'tanggal' => '2026-09-01 08:15:20'],
            ['name' => 'Sampel 22',  'ph' => 7.0567, 'tds' => 248.10,  'turbidity' => 2.30,  'temperature' => 28.10, 'kualitas' => 1, 'tanggal' => '2026-09-01 13:19:13'],
            ['name' => 'Sampel 13',  'ph' => 5.2310, 'tds' => 1250.75, 'turbidity' => 26.40, 'temperature' => 30.20, 'kualitas' => 0, 'tanggal' => '2026-09-02 09:05:41'],
            ['name' => 'Sampel 14',  'ph' => 7.4821, 'tds' => 189.60,  'turbidity' => 1.20,  'temperature' => 26.80, 'kualitas' => 1, 'tanggal' => '2026-09-02 15:42:08'],
            ['name' => 'Sampel 15',  'ph' => 9.1045, 'tds' => 980.30,  'turbidity' => 18.90, 'temperature' => 31.00, 'kualitas' => 0, 'tanggal' => '2026-09-03 10:30:55'],
            ['name' => 'Sampel 16',  'ph' => 6.9873, 'tds' => 302.25,  'turbidity' => 3.10,  'temperature' => 27.90, 'kualitas' => 1, 'tanggal' => '2026-09-03 16:11:27'],
            ['name' => 'Sampel 17',  'ph' => 4.8560, 'tds' => 1580.00, 'turbidity' => 41.70, 'temperature' => 29.60, 'kualitas' => 0, 'tanggal' => '2026-09-04 07:48:36'],
            ['name' => 'Sampel 18',  'ph' => 7.3392, 'tds' => 176.85,  'turbidity' => 0.90,  'temperature' => 26.40, 'kualitas' => 1, 'tanggal' => '2026-09-04 12:25:02'],
            ['name' => 'Sampel 19',  'ph' => 8.9418, 'tds' => 1120.50, 'turbidity' => 33.20, 'temperature' => 30.80, 'kualitas' => 0, 'tanggal' => '2026-09-05 09:57:14'],
            ['name' => 'Sampel 20', 'ph' => 7.1126, 'tds' => 267.90,  'turbidity' => 2.70,  'temperature' => 27.20, 'kualitas' => 1, 'tanggal' => '2026-09-05 14:36:49'],
        ];

        foreach ($data as $row) {
            Pengukuran::create($row);
        }
    }
}