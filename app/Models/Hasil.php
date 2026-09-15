<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasil extends Model
{
   // use HasFactory;
   use SoftDeletes;

   public $table = 'hasil';

   protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
   ];

   protected $fillable = [
    'accuracy',
    'precission',
    'recall',
    'f_score'
   ];


}
