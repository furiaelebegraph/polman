<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Produ;
use App\SubCate;
use Carbon\Carbon;
use App\Mail\EnviarCorreo;
use App\TablaContacto;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
	public function welcome(){
		$productos = Produ::orderBy('id','desc')->get();
		return view('welcome', compact('productos'));
	}
	public function enviarCorreo(Request $request){
	    $this->validate($request,
	    	[
		    'nombre' 	=> 'required|min:2|max:255',
		    'correo' 	=> 'required|email',
		    'contenido' => 'required|min:5',
			],
			[
				'required' => 'El :attribute es necesario.'
			]
	    );
		$input = $request->all();
		Mail::to('emmanegr@gmail.com')->send(new EnviarCorreo($input));


		if( count(Mail::failures()) > 0 ) {

		   echo "There was one or more failures. They were: <br />";

		   foreach(Mail::failures as $email_address) {
		       echo " - $email_address <br />";
		    }

		} else {
		    echo "No errors, all sent successfully!";
		}

	    $salvar = new TablaContacto();
		$salvar->nombre = $request->nombre;
		$salvar->correo =	$request->correo;
		$salvar->contenido = $request->contenido;
		$salvar->save();

		return redirect('/')->with('message', 'Su correo fue enviado!');
	}

}