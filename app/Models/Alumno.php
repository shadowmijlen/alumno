<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $table = "alumnos";

    protected $fillable = [
        'codigo', 'nombres', 'apaterno', 'tipodoc', 'nrodoc', 'correo', 'celular', 'sexo', 'flestado',
    ];
}
