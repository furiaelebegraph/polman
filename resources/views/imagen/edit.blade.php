@extends('layouts.app')
@section('content')

<section class="content">
    <h1>
        Editar Imagen
    </h1>
    <form method = 'get' action = '{!!url("imagen")!!}'>
        <button class = 'btn btn-danger'>Ver Imagen</button>
    </form>
    <br>
    <div>
        Pertenece a {{$imagen->produ->nombre}}
    </div>
    <form method = 'POST' action = '{!! url("imagen")!!}/{!!$imagen->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$imagen->nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="imagen">imagen</label>
            <img src="{!! asset($imagen->imagen)!!}" alt="">
            <input id="imagen" name = "imagen" type="file" class="form-control" value="{!!$imagen->imagen!!}"> 
        </div>
        <div class="form-group">
            <label for="orden">Orden</label>
            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$imagen->orden!!}"> 
        </div>
        <div class="form-group">
            <label for="orden">Activo</label>
            <select class="form-control"  name="activo">
                <option selected="selected" value="{{$imagen->activo}}">{{$imagen->activo}}</option>
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection