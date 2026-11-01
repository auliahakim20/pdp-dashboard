<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengukuran extends Model
{
    use SoftDeletes;

    protected $table = 'pengukuran';

    protected $fillable = [
        'name', 'ph', 'tds', 'turbidity', 'temperature', 'kualitas', 'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function getKualitasLabelAttribute()
    {
        return $this->kualitas == 1 ? 'Baik' : 'Buruk';
    }
}
