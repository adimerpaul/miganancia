<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    protected $fillable=[
        "foto",
        "tipo",
        "nombre",
        "direccion",
        "ciudad",
        "user_id",
    ];
}
