<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property $id
 * @property $Fecha_de_reserva
 * @property $Duracion
 * @property $Nombre_del_alumno
 * @property $Codigo_del_alumno
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Fecha_de_reserva', 'Duracion','Lugar','Nombre_del_alumno', 'Codigo_del_alumno'];


}
