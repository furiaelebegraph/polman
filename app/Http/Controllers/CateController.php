<?php

namespace App\Http\Controllers;

use App\Cate;
use Illuminate\Http\Request;
use App\Produ;
use App\SubCate;
use Image;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Categorias';
        $categorias = Cate::paginate(10);
        $subcate = SubCate::all();
        return view('categoria.index', compact('categorias', 'subcate', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Categoria';
        return view('categoria.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:cate|max:255',
            'imagen' => 'required | image | max:2000',
        ]);
        $categoria = new Cate();
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $filename = time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path('img/categoria/' . $filename);
            Image::make($imagen)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path);
            

            $categoria->imagen = '/img/categoria/'.$filename;
            
        }

        $categoria->nombre = $request->nombre;
        $categoria->orden = $request->orden;
        $categoria->save();
        return redirect('categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $title = 'Categoria';

        if($request->ajax())
        {
            return URL::to('categoria/'.$id);
        }

        $categoria = Cate::findOrfail($id);
        return view('categoria.show',compact('title','categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Editar Categoria';
        if($request->ajax())
        {
            return URL::to('categoria/'. $id . '/edit');
        }
        
        $categoria = Cate::findOrfail($id);
        return view('categoria.edit',compact('title','categoria'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $categoria = Cate::findOrfail($id);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $filename = time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path('img/categoria/' . $filename);
            Image::make($imagen)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path);
            

            $categoria->imagen = '/img/categoria/'.$filename;
            
        }

        $categoria->nombre = $request->nombre;
        $categoria->save();
        return redirect('categoria');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Cate::find($id);
        $product->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
        //
    }
}
