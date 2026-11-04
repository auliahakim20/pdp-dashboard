<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class DokumentasiIndex extends Component
{
    /**
     * Baca semua foto di public/images/dokumentasi/{folder}.
     * Nama file jadi keterangan foto: "ambil-sampel_01.jpg" -> "Ambil sampel 01".
     */
    private function ambilFoto($folder)
    {
        $path = public_path('images/dokumentasi/' . $folder);

        if (!File::isDirectory($path)) {
            return collect();
        }

        return collect(File::files($path))
            ->filter(function ($f) {
                return in_array(strtolower($f->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
            })
            ->sortBy(function ($f) {
                return $f->getFilename();
            }, SORT_NATURAL | SORT_FLAG_CASE)
            ->values()
            ->map(function ($f) use ($folder) {
                $nama = pathinfo($f->getFilename(), PATHINFO_FILENAME);

                return [
                    'url'   => asset('images/dokumentasi/' . $folder . '/' . rawurlencode($f->getFilename())),
                    'judul' => ucfirst(trim(preg_replace('/[-_]+/', ' ', $nama))),
                ];
            });
    }

    public function render()
    {
        return view('livewire.dokumentasi-index', [
            'fotoAir' => $this->ambilFoto('pengambilan-air'),
            'fotoTim' => $this->ambilFoto('tim-bekerja'),
        ])->layout('layouts.public');
    }
}
