<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cutter extends Model
{
    use HasFactory;

    protected $table = "cutter";

    protected $fillable = [
        "numeros",
        "letras"

        
    ];
}
