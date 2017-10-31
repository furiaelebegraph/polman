@extends('layouts.app')
@section('content')

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

            <section class="contenedor">
                <section class="row row-centered">
                    <div class="col-md-8 col-xs-12 col-centered">
                        <div class="row">
                            <div class="col-xs-6 col-centered">
                                <form  method = 'get' action = '{{url("/home")}}'>
                                    <button class="button-two" type = 'submit'><span class="texto_blanco">DASHBOARD</span></button>
                                </form>
                            </div>
                            <div class="col-xs-6 col-centered">
                                <form method = 'get' action = '{!!url("imagen")!!}'>
                                    <button class = 'btn btn-danger'>Ver todos las SubCategorias</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-8 col-centered">
                        <div class='titulo_seccion'>
                            Crear Album
                        </div class='titulo_seccion'>
                    </div>

                    @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    <div class="col-xs-12 col-md-8 col-centered formularios">
                        <form method = 'POST' action = '{!!url("imagen")!!}' enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <meta name="_token" content="{!! csrf_token() !!}">
                            <input type="hidden" name='id_producto' value='{{$producto->id}}'>
                            <div class="form-group">
                                <label for="titulo">Nombre</label>
                                <input id="titulo" name = "nombre" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" name = "imagen" type="file" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="orden">Orden</label>
                                <input id="orden" name = "alter" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="orden">Activo</label>
                                <select class="form-control" name="sino">
                                    <option selected="selected"  value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="sub-main_crear">
                              <button class="button-two_crear" type = 'submit'><span class="texto_blanco">Crear</span></button>
                            </div>
                        </form>
                    </div>

                </section> 
            </section>
    </div>
</div>
@endsection
