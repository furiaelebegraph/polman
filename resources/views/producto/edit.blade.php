@extends('layouts.admin')

@section('contenido')
    <div class="content-wrapper">

      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class='alert alert-danger'>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if(Session::has('info'))
            <div class="alert alert-info">
                {{ Session::get('info') }}
            </div>
        @endif
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
                    <form method = 'get' action = '{!!url("producto")!!}'>
                        <button class = 'btn btn-danger'>Ver Categorias</button>
                    </form>
                    <br>
                    <form method = 'POST' action = '{!! url("producto")!!}/{!!$producto->
                        id!!}/update' enctype="multipart/form-data"> 
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$producto->nombre!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="imagen">imagen</label>
                            <img src="{!! asset($producto->imagen)!!}" alt="">
                            <input id="imagen" name = "imagen" type="file" class="form-control" value="{!!$producto->imagen!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Orden</label>
                            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$producto->orden!!}"> 
                        </div>
                        <div class="form-group">
                            <label for="orden">Categoria</label>
                            <select id='cate' class="form-control"  name="id_categoria">
                                <option selected="selected" value="{{$producto->cate->id}}">{{$producto->cate->nombre}}</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('subcate') ? ' has-error' : '' }}">
                            <label for="subcate" class="col-md-12 control-label">Sub Categoria</label>
                            <select name="id_subcategoria" class="form-control" id='subcate'>
                                 <option selected="selected" value="{{$producto->subcate->id}}">{{$producto->subcate->nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="orden">Activo</label>
                            <select class="form-control"  name="activo">
                                <option selected="selected" value="{{$producto->activo}}">{{$producto->activo}}</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <button class = 'btn btn-primary' type ='submit'>Update</button>
                    </form>
                    <div class="col-12">
                        @if($producto->ima->count() <= 0)
                            <div class="jumbotron text-center">
                                <div class="container">
                                    <h1 class="jumbotron-heading">No hay fotos en esta Galeria</h1>
                                    <div class="card">
                                      <div class="card-block">
                                        <form method='POST' action="{!! url("imagen/cargarGale")!!}" enctype="multipart/form-data">
                                            <input type="hidden" name = '_token' value = '{{Session::token()}}'>
                                            <input type="hidden" name="id_producto" value={{$producto->id}}>
                                            <input type="hidden" name="nombreProdu" value={{$producto->nombre}}>
                                            <div class="form-group">
                                                <label  class="col-2 col-form-label" for="galeria">Agregar Galeria</label>
                                                <input  class="form-control" type="file" name="galeria[]" multiple>
                                            </div>

                                            <button class='text-right btn btn-primary' type='submit'>Update</button>
                                        </form>
                                      </div> 
                                    </div>
                                </div>
                            </div>

                        @else
                            <div class="jumbotron text-center">
                                <div class="container">
                                    <h1 class="jumbotron-heading">Galeria</h1>
                                    <div class="row">
                                        <div class="card-deck">
                                            @foreach($producto->ima as $imagen)
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset($imagen->imagen)}}" alt="">
                                                <div class="card-block">
                                                    <a class="btn btn-primary" href="/imagen/{{$imagen->id}}/edit">Editar</a>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        })
            
        $('#cate').append(' Please choose one');
        $('#cate').on('change',function(e){
            var potato = e.target.value;
            console.log(potato);
            $.get('/ajaxSucate/'+ potato+'', function(data){

                $('#subcate').empty();
                $('#subcate').append('<option>Elije una opcion </option>');
                console.log(data);
                $.each(data, function(index, subcateObj){
                    $('#subcate').append('<option value="'+ subcateObj.id+'">'+ subcateObj.nombre +'</option>');
                });
            });
        });
    });
</script>
@endsection