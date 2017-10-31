<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    function produ(){
    	return $this->hasMany(Produ::class); 
    }
    function subcate(){
    	return $this->hasMany(SubCate::class);
    }
    protected $table = 'cate';
    protected $fillable = [
        'nombre','imagen'
    ];
}
