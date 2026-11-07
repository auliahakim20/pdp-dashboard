<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $data = [
            ['nama_kecamatan' => 'Gemuh', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Cepiring', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Boja', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Kendal', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Ringinarum', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Weleri', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Pegandon', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Ngampel', 'wilayah' => 'Kabupaten Kendal'],
        ];
            foreach ($data as $row) {
            Wilayah::create($row);
        }
    }
}
