<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - Company';
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $title = 'Crear Info Company';
        return view('company.create', compact('title', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $company = new Company();
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $filename = time().'.'.$imagen->getClientOriginalExtension();
                $path = 'img/ima/'.$filename;
                Image::make($imagen)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                $company->imagen = 'img/ima/'.$filename;
            }

                $company->nombre = $request->nombre;

                $company->produ_id = $request->id_producto;

                $company->save();

                return redirect('company');
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
}
