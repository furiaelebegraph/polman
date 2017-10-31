<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ima extends Model
{
    function produ(){
    	return $this->belongsTo(Produ::class, 'produ_id');
    }
    public static function obtenerImagenes($id){
    	return Ima::where('produ_id', '=', $id)->select('imagen','id', 'nombre')->orderBy('orden', 'asc')->get();
    }
	protected $table = 'imgs';
    protected $fillable = [
        'nombre','imagen', 'produ_id', 'orden', 'activo'
    ];
}
