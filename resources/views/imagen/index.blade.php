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
                <div class="col-md-8 col-xs-12 col-centered">
                    <div class="col-xs-12 col-centered">
                        <div class="row">
                            <div class="col-xs-6 col-centered">
                                <form  method = 'get' action = '{{url("/home")}}'>
                                    <button class="button-two" type = 'submit'><span class="texto_blanco">ADMIN</span></button>
                                </form>
                            </div>
                            <div class="col-xs-6 col-centered">
                                <form class = 'col s3' method = 'get' action = '{!!url("imagen")!!}/create'>
                                    <div class="sub-main">
                                      <button class="button-two" type = 'submit'><span class="texto_blanco">Crear nuevo Producto</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-12 col-centered">
                        <div class="table-responsive">
                            <table class='table table-striped' cellpadding="10">
                                <thead>
                                    <tr>
                                        <td>Producto</td>
                                        <td>categoria</td>
                                        <td>subcategoria</td>
                                        <td>Imagen</td>
                                        <td>Orden</td>
                                        <td>BORRAR</td>
                                        <td>EDITAR</td>
                                        <td>INFO</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($productos as $producto) 
                                    <tr>
                                        <td>{!!$producto->nombre!!}</td>
                                        <td>
                                            {{$producto->cate->nombre}}
                                        </td>
                                        <td>
                                            {{$producto->subcate->nombre}}
                                        </td>
                                        <td> <img class='al_100' src="{!!$producto->imagen!!}" alt=""> 
                                        </td>
                                        <td>
                                            {{$producto->orden}}
                                        </td>
                                        <td>
                                            <a href="/producto/{!!$producto->id!!}/delete" data-toggle="modal"  class = 'delete btn btn-danger btn-xs'><i class = 'material-icons'>Borrar</i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('producto.edit', $producto->id) }}" class = 'viewEdit btn btn-primary btn-xs' data-link = '/subcategoria/{!!$producto->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                                        </td>
                                        <td>
                                            <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/subcategoria/{!!$producto->id!!}'><i class = 'material-icons'>info</i></a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>    
                        </div>    
                    </div>
                    {!! $productos->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection