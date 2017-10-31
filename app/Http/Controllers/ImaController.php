<?php

namespace App\Http\Controllers;

use App\Ima;
use Illuminate\Http\Request;
use App\Produ;
use Image;

class ImaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Imagenes';
        return view('imagen.index', compact('imagenes', 'productos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $title = 'Crear Imagen';
        $producto = Produ::findOrfail($id);
        return view('imagen.create', compact('title', 'producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $imagen = new Ima();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/ima/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $imagen->imagen = 'img/ima/'.$filename;
            }

                $imagen->nombre = $request->nombre;

                $imagen->produ_id = $request->id_producto;

                $imagen->save();

                return redirect('imagen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ima  $ima
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Mostrar Imagenes';

        if($request->ajax())
        {
            return URL::to('imagen/'.$id);
        }

        $imagen = Ima::findOrfail($id);
        return view('imagen.show',compact('title','imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ima  $ima
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $imagen = Ima::findOrfail($id);
        $producto = Produ::all();
        return view('imagen.edit',compact('imagen', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ima  $ima
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ima  $ima
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $imagen = Ima::findOrFail($id);
        $imagen->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }

    public function cargarGaleria( Request $request){
                $this->validate($request, [
                    'galeria.*' => 'required | image',
                ],[   
                    'galeria'    => 'Por favor agrega imagenes.'
                ]);
                $photos = $request->file('galeria');
                if (!empty($photos)) {
                    foreach ($photos as $indexPhoto=>$photo) {
                        $nombre = $request->nombreProdu.'_'.$indexPhoto.'_'.$photo->hashName();
                        $path = 'img/imagenes/'.$nombre;
                        $imagenes = new Ima();
                        Image::make($photo)->resize(null, 400, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save($path);
                        $imagenes->produ_id = $request->id_producto;
                        $imagenes->imagen = $path;
                        $imagenes->nombre =  $request->nombreProdu.'_'.$indexPhoto.'_'.$photo->hashName();
                        $imagenes->orden = $indexPhoto;
                        $imagenes->save();
                    }
                }else{
                    return back()->with('info', 'No se cargaron imagenes :(');
                }

                return redirect('producto');
    }
}
