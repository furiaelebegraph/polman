@extends('layouts.admin')

@section('contenido')
    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-12 mb-12">
                <h1>
                    Editar SubCategoria
                </h1>
                <form method = 'get' action = '{!!url("subcategoria")!!}'>
                    <button class = 'btn btn-danger'>Ver Sub Categorias</button>
                </form>
                <br>
                <form method = 'POST' action = '{!! url("subcategoria")!!}/{!!$subcategoria->
                    id!!}/update'> 
                    <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$subcategoria->nombre!!}"> 
                    </div>
                    <div class="form-group">
                        <label for="imagen">imagen</label>
                        <img src="{!! asset($subcategoria->imagen)!!}" alt="">
                        <input id="imagen" name = "imagen" type="file" class="form-control" value="{!!$subcategoria->imagen!!}"> 
                    </div>
                    <div class="form-group">
                        <label for="orden">Orden</label>
                        <input id="orden" name = "orden" type="text" class="form-control" value="{!!$subcategoria->orden!!}"> 
                    </div>
                    <div class="form-group">
                        <label for="orden">Categoria</label>
                        <select class="form-control"  name="id_categoria">
                            <option selected="selected" value="{{$subcategoria->cate->id}}">{{$subcategoria->cate->nombre}}</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orden">Activo</label>
                        <select class="form-control"  name="activo">
                            <option selected="selected" value="{{$subcategoria->activo}}">{{$subcategoria->activo}}</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <button class = 'btn btn-primary' type ='submit'>Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection