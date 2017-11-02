<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablaContacto extends Model
{

	protected $table = 'tablacontacto';
    protected $fillable = [
        'nombre','correo', 'contenido'
    ];
}
