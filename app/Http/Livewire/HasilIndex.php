<?php

namespace App\Http\Livewire;

use App\Models\Hasil;
use Livewire\Component;

class HasilIndex extends Component
{
    public function render()
    {
        $data = Hasil::orderBy('tanggal')->get();
        return view('livewire.hasil-index',[
            'data' => $data,
        ]);
    }
}
