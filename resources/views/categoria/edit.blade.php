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
                        Editar Categoria
                    </h1>
                    <form method = 'get' action = '{!!url("categoria")!!}'>
                        <button class = 'btn btn-danger'>Ver Categorias</button>
                    </form>
                    <br>
                    <form method = 'POST' action = '{!! url("categoria")!!}/{!!$categoria->
                        id!!}/update' enctype="multipart/form-data"> 
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$categoria->nombre!!}">
                        </div>
                        <div class="form-group">
                            <label for="imagen">imagen</label>
                            <img src="{!! asset($categoria->imagen)!!}" alt="">
                            <input id="imagen" name = "imagen" type="file" class="form-control" value="{!!$categoria->imagen!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$categoria->orden!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Activo</label>
                            <select  class="form-control" name="activo">
                                <option selected="selected" value="{{$categoria->activo}}">{{$categoria->activo}}</option>
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