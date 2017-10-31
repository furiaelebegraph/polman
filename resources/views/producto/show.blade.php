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
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card-columns">
                        <div class="card mb-3">
                            <img class="card-img-top img-fluid w-100"  src="{{asset($producto->imagen)}}" alt="">
                        </div>
                        <div class="card-body">
                              <h6 class="card-title mb-1">
                                <a href="/producto/{!!$producto->id!!}">{{$producto->nombre}}</a>
                              </h6>
                              <p class="card-text small">Editar
                                <a href="/producto/{!!$producto->id!!}/edit">#surfsup</a>
                              </p>

                              <p class="card-text small">Eliminar
                                <a href="/producto/{!!$producto->id!!}/edit">#surfsup</a>
                              </p>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    @foreach($producto->ima as $elprodu)
                        <div class="card">
                            <img class="card-img-top" src="{{asset($elprodu->imagen)}}" alt="">
                            <div class="card-block">
                                <h4 class="card-title">Editar</h4>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection