<?php

namespace App\Http\Controllers;

use App\SubCate;
use Illuminate\Http\Request;
use App\Cate;
use Image;

class SubCateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - SubCategorias';
        $subcategorias = SubCate::paginate(10);
        $categorias = Cate::all();
        return view('subcategoria.index', compact('categorias', 'subcategorias', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Sub Categoria';
        $categorias = Cate::all();
        return view('subcategoria.create', compact('title', 'categorias'));
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
            'imagen' => 'required | mimes:jpeg,jpg,png | max:2000',
        ]);
        $subcategoria = new SubCate();
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $filename = time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path('img/subcategoria/' . $filename);
            Image::make($imagen)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path);
            

            $subcategoria->imagen = '/img/subcategoria/'.$filename;
            
        }
        $subcategoria->cate_id = $request->id_categoria;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->activo = $request->sino;
        $subcategoria->orden = $request->alter;
        $subcategoria->save();
        return redirect('subcategoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCate  $subCate
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('subcategoria/'.$id);
        }


        $subcategoria = SubCate::findOrfail($id);
        return view('subcategoria.show',compact('subcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCate  $subCate
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $subcategoria = SubCate::findOrfail($id);
        $categorias = Cate::all();
        return view('subcategoria.edit',compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCate  $subCate
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $subcategoria = SubCate::findOrFail($id);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $filename = time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path('img/subcategoria/' . $filename);
            Image::make($imagen)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path);
            

            $subcategoria->imagen = '/img/subcategoria/'.$filename;
            
        }

        $subcategoria->cate_id = $request->id_categoria;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->orden = $request->orden;
        $subcategoria->activo = $request->activo;  
        $subcategoria->save();
        return redirect('subcategoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCate  $subCate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $subcategoria = SubCate::findOrFail($id);
        $subcategoria->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
        //
    }
}
