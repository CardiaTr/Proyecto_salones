<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
   use HasFactory;
    protected $fillable = ['Fecha_de_reserva', 'Duracion', 'Nombre_del_alumno', 'Codigo_del_alumno'];


}
