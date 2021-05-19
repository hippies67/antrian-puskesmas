<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliKlinik extends Model
{
    use HasFactory;

    protected $table = "poliklinik";
    protected $fillable = [
        'poli', 'status'
    ];
}
