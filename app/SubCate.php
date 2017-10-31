<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCate extends Model
{
    function produ(){
    	return $this->hasMany(Produ::class, 'cate_id'); 
    }
    function cate(){
    	return $this->belongsTo(Cate::class, 'cate_id');
    }

    public static function obtenerSubCategoria($id){
        return SubCate::where('cate_id', '=', $id)->select('nombre','id', 'imagen')->get();
    }
	protected $table = 'subcate';
    protected $fillable = [
        'nombre','imagen', 'cate_id', 'orden', 'activo'
    ];
}
