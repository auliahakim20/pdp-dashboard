<?php

namespace App\Http\Livewire;

use App\Models\Hasil;
use App\Models\Pengukuran;
use Livewire\Component;
use Livewire\WithPagination;

class HasilIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $kualitas = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingKualitas()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = Hasil::orderBy('tanggal')->get();

        $pengukuran = Pengukuran::where('name', 'like', '%' . $this->search . '%')
            ->when($this->kualitas !== '', function ($query) {
                $query->where('kualitas', $this->kualitas);
            })
            ->orderBy('tanggal')
            ->paginate(10);

        // data grafik: semua data, tidak ikut pagination
        $grafik = Pengukuran::orderBy('tanggal')->get();

        return view('livewire.hasil-index', [
            'data' => $data,
            'avgAccuracy' => round($data->avg('accuracy'), 2),
            'avgPrecision' => round($data->avg('precision'), 2),
            'avgRecall' => round($data->avg('recall'), 2),
            'avgFScore' => round($data->avg('f_score'), 2),
            'totalPercobaan' => $data->count(),
            'pengukuran' => $pengukuran,

            // label sumbu X dan judul tooltip (dipakai bersama oleh ketiga grafik)
            'grafikLabels' => $grafik->map(function ($r) {
                return $r->tanggal->format('H:i:s');
            })->values(),
            'grafikTooltip' => $grafik->map(function ($r) {
                return $r->tanggal->format('d M Y, H:i:s');
            })->values(),

            // TDS
            'tdsValues' => $grafik->map(function ($r) {
                return (float) $r->tds;
            })->values(),
            'tdsAvg' => number_format($grafik->avg('tds') ?? 0, 1, ',', '.'),

            // Turbidity
            'turbidityValues' => $grafik->map(function ($r) {
                return (float) $r->turbidity;
            })->values(),
            'turbidityAvg' => number_format($grafik->avg('turbidity') ?? 0, 2, ',', '.'),

            // Temperature
            'temperatureValues' => $grafik->map(function ($r) {
                return (float) $r->temperature;
            })->values(),
            'temperatureAvg' => number_format($grafik->avg('temperature') ?? 0, 1, ',', '.'),
        ])->layout('layouts.public');
    }
}