<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produ extends Model
{
    function ima(){
    	return $this->hasMany(Ima::class);
    }
    function cate(){
    	return $this->belongsTo(Cate::class);
    }
    function subcate(){
    	return $this->belongsTo(SubCate::class, 'sub_cate_id');
    }
    public static function obtenerProductos($id){
        return Produ::where('sub_cate_id', '=', $id)->select('nombre','id', 'imagen')->get();
    }
    protected $table = 'produ';
    protected $fillable = [
        'nombre','imagen', 'cate_id', 'sub_cate_id', 'orden'
    ];
}
