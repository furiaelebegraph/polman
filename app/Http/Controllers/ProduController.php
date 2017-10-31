<?php

namespace App\Http\Controllers;

use App\Produ;
use Illuminate\Http\Request;
use Image;
use App\SubCate;
use App\Cate;
use App\Ima;

class ProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = 'Index - Producto';
        $albums = Produ::with('Ima')->get();
        $productos = Produ::paginate(10);
        $imagenes = Ima::all();
        $sucategorias = SubCate::all();
        return view('producto.index', compact('albums', 'productos','imagenes', 'sucategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear Producto';
        $subcategorias = SubCate::all();
        $categorias = Cate::all();
        return view('producto.create', compact('title', 'productos', 'subcategorias', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $producto = new Produ();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/producto/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $producto->imagen = 'img/producto/'.$filename;
            }
                $producto->nombre = $request->nombre;
                $producto->subcate_id = $request->id_subcategoria;
                $producto->cate_id = $request->id_categoria;
                $producto->orden = $request->alter;
                $producto->save();
                $photos = $request->file('photos');
                if (!empty($photos)) {
                    foreach ($photos as $indexPhoto=>$photo) {
                        $nombre = $producto->nombre.'_'.$indexPhoto.'_'.$photo->hashName();
                        $path = 'img/imagenes/'.$nombre;
                        $imagenes = new Ima();
                        Image::make($photo)->resize(null, 400, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save($path);
                        $imagenes->produ_id = $producto->id;
                        $imagenes->imagen = $path;
                        $imagenes->nombre =  $producto->nombre.'_'.$indexPhoto.'_'.$photo->hashName();
                        $imagenes->orden = $indexPhoto;
                        $imagenes->save();
                    }
                }

                return redirect('producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produ  $produ
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request){
        $producto = Produ::with('Ima')->findOrfail($id);
        return view('producto.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produ  $produ
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $producto = Produ::findOrfail($id);
        $categorias = Cate::all();
        return view('producto.edit',compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produ  $produ
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
            $producto = Produ::findOrfail($id);
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/producto/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $producto->imagen = 'img/producto/'.$filename;
            }

                $producto->nombre = $request->nombre;
                $producto->subcate_id = $request->id_subcategoria;
                $producto->cate_id = $request->id_categoria;
                $producto->orden = $request->orden;
                $producto->save();

                return redirect('producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produ  $produ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $producto = Produ::findOrFail($id);
        $producto->delete();
        return back()->with('info', 'Fue eliminado exitosamente');
    }

    public function ajaxSucate($id)
    {
            $subarea = SubCate::obtenerSubCategoria($id);
            return response()->json($subarea);
    }
    public function ajaxProdu($id)
    {
            $produs = Produ::obtenerProductos($id);
            return response()->json($produs);
    }
    public function ajaxIma($id)
    {
            $imas = Ima::obtenerImagenes($id);
            return response()->json($imas);
    }
}
