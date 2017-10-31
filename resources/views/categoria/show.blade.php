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
                            <img class="card-img-top img-fluid w-100"  src="{{asset($categoria->imagen)}}" alt="">
                        </div>
                        <div class="card-body">
                              <h6 class="card-title mb-1">
                                <a href="/categoria/{!!$categoria->id!!}">{{$categoria->nombre}}</a>
                              </h6>
                              <p class="card-text small">Editar
                                <a href="/categoria/{!!$categoria->id!!}/edit">#surfsup</a>
                              </p>

                              <p class="card-text small">Eliminar
                                <a href="/categoria/{!!$categoria->id!!}/edit">#surfsup</a>
                              </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection