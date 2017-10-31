<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Produ;
use App\SubCate;
use Carbon\Carbon;
use App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
	public function welcome(){
		$categorias = Cate::all();
		$galerias = Produ::orderBy('created_at', 'desc')->first();
		return view('welcome', compact('categorias', 'galerias'));
	}
	public function enviarCorreo(Request $request){
		$rules = [
		    'nombre' 	=> 'required|max:255',
		    'correo' 	=> 'required|email',
		    'contenido' => 'required|min:5',
		];
		$mensaje = [
			'required' => 'El :attribute es necesario.'
		];

	    $this->validate($request, $rules, $mensaje);

		$input = $request->all();
		Mail::to('emmanegr@gmail.com')->send(new EnviarCorreo($input));
		return back()->with('mensaje', 'Su correo fue enviado!');
	}

}