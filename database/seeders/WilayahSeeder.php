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
            ['nama_kecamatan' => 'Sijeruk', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Tunggulrejo', 'wilayah' => 'Kabupaten Kendal'],
            ['nama_kecamatan' => 'Patebon', 'wilayah' => 'Kabupaten Kendal'],
        ];
            foreach ($data as $row) {
            Wilayah::create($row);
        }
    }
}
