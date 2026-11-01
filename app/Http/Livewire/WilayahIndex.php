<?php

namespace App\Http\Livewire;

use App\Models\Wilayah;
use Livewire\Component;

class WilayahIndex extends Component
{
    public function render()
    {
        return view('livewire.wilayah-index', [
            'data' => Wilayah::orderBy('nama_kecamatan')->get(),
        ])->layout('layouts.public');
    }
}