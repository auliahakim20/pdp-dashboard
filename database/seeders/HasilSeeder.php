<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hasil;

class HasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Pengujian', 
            'tanggal' => '2026-08-01', 
            'accuracy' => 85.50, 
            'recall' => 82.30, 
            'f_score' => 83.80, 
            'precision' => 90.00],
        ];

        foreach ($data as $row) {
            Hasil::create($row);
        }
    }
}
