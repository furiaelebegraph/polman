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
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  {{$categorias->count()}} Categorias <br>
                </div>
              </div>
              <a href="{{url('categoria')}}" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Ver todas las Categorias</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
                <a href="{{route('categoria.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVA Categoria</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  {{$subcategorias->count()}} SubCategorias
                </div>
              </div>
              <a href="{{url('subcategoria')}}" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Ver todas las SubCategorias</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
                <a href="{{route('subcategoria.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVA SubCategoria</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">
                  {{$productos->count()}} Productos
                </div>
              </div>
                <a href="{{url('producto')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Ver todas los Productos</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <a href="{{route('producto.create')}}" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">NUEVO Producto</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
          </div>
        </div>


          <div class="col-lg-12">

            <!-- Card Columns Example Social Feed -->
            <div class="mb-0 mt-4">
              <i class="fa fa-newspaper-o"></i>
              Ultimos elementos creados</div>
            <hr class="mt-2">
            <div class="card-columns">

              <!-- Example Social Card -->
              <div class="card mb-3">
                
                @foreach($ultimoproductos as $ultimoproducto)
                    <a href="/producto/{!!$ultimoproducto->id!!}">
                        <img class="card-img-top img-fluid w-100"  src="{{$ultimoproducto->imagen}}" alt="">
                    </a>
                    <div class="card-body">
                      <h6 class="card-title mb-1">
                        <a href="/producto/{!!$ultimoproducto->id!!}">{{$ultimoproducto->nombre}}</a>
                      </h6>
                      <p class="card-text small">These waves are looking pretty good today!
                        <a href="#">#surfsup</a>
                      </p>
                    </div>
                    <hr class="my-0">
                    <div class="card-body py-2 small">
                      <a class="mr-3 d-inline-block" href="/producto/{!!$ultimoproducto->id!!}/edit">
                        <i class="fa fa-fw fa-edit"></i>
                        Editar
                      </a>
                      <a class="mr-3 d-inline-block" href="/producto/{!!$ultimoproducto->id!!}/delete">
                        <i class="fa fa-fw fa-times"></i>
                        Eliminar
                      </a>
                    </div>
                    <div class="card-footer small text-muted">
                      Creado {{$ultimoproducto->created_at->toFormattedDateString()}}
                    </div>
                @endforeach
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">John Smith</a>
                  </h6>
                  <p class="card-text small">Another day at the office...
                    <a href="#">#workinghardorhardlyworking</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <div class="card-body small bg-faded">
                  <div class="media">
                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <h6 class="mt-0 mb-1">
                        <a href="#">Jessy Lucas</a>
                      </h6>
                      Where did you get that camera?! I want one!
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a href="#">Like</a>
                        </li>
                        <li class="list-inline-item">
                          ·
                        </li>
                        <li class="list-inline-item">
                          <a href="#">Reply</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  Posted 46 mins ago
                </div>
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">


                @foreach($ultimacates as $ultimacate)
                    <a href="/categoria/{!!$ultimacate->id!!}">
                        <img class="card-img-top img-fluid w-100"  src="{{$ultimacate->imagen}}" alt="">
                    </a>
                    <div class="card-body">
                      <h6 class="card-title mb-1">
                        <a href="/categoria/{!!$ultimacate->id!!}">{{$ultimacate->nombre}}</a>
                      </h6>
                      <p class="card-text small">These waves are looking pretty good today!
                        <a href="#">#surfsup</a>
                      </p>
                    </div>
                    <hr class="my-0">
                    <div class="card-body py-2 small">
                      <a class="mr-3 d-inline-block" href="/categoria/{!!$ultimacate->id!!}/edit">
                        <i class="fa fa-fw fa-edit"></i>
                        Editar
                      </a>
                      <a class="mr-3 d-inline-block" href="/categoria/{!!$ultimacate->id!!}/delete">
                        <i class="fa fa-fw fa-times"></i>
                        Eliminar
                      </a>
                    </div>
                    <div class="card-footer small text-muted">
                      Creado {{$ultimacate->created_at->toFormattedDateString()}}
                    </div>
                @endforeach



                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">Jeffery Wellings</a>
                  </h6>
                  <p class="card-text small">Nice shot from the skate park!
                    <a href="#">#kickflip</a>
                    <a href="#">#holdmybeer</a>
                    <a href="#">#igotthis</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <div class="card-footer small text-muted">
                  Posted 1 hr ago
                </div>
              </div>

              <!-- Example Social Card -->
              <div class="card mb-3">
                <a href="#">
                  <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-1">
                    <a href="#">David Miller</a>
                  </h6>
                  <p class="card-text small">It's hot, and I might be lost...
                    <a href="#">#desert</a>
                    <a href="#">#water</a>
                    <a href="#">#anyonehavesomewater</a>
                    <a href="#">#noreally</a>
                    <a href="#">#thirsty</a>
                    <a href="#">#dehydration</a>
                  </p>
                </div>
                <hr class="my-0">
                <div class="card-body py-2 small">
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                    Like
                  </a>
                  <a class="mr-3 d-inline-block" href="#">
                    <i class="fa fa-fw fa-comment"></i>
                    Comment
                  </a>
                  <a class="d-inline-block" href="#">
                    <i class="fa fa-fw fa-share"></i>
                    Share
                  </a>
                </div>
                <hr class="my-0">
                <div class="card-body small bg-faded">
                  <div class="media">
                    <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <h6 class="mt-0 mb-1">
                        <a href="#">John Smith</a>
                      </h6>
                      The oasis is a mile that way, or is that just a mirage?
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <a href="#">Like</a>
                        </li>
                        <li class="list-inline-item">
                          ·
                        </li>
                        <li class="list-inline-item">
                          <a href="#">Reply</a>
                        </li>
                      </ul>
                      <div class="media mt-3">
                        <a class="d-flex pr-3" href="#">
                          <img src="http://placehold.it/45x45" alt="">
                        </a>
                        <div class="media-body">
                          <h6 class="mt-0 mb-1">
                            <a href="#">David Miller</a>
                          </h6>
                          <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">
                          I'm saved, I found a cactus. How do I open this thing?
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                              <a href="#">Like</a>
                            </li>
                            <li class="list-inline-item">
                              ·
                            </li>
                            <li class="list-inline-item">
                              <a href="#">Reply</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">
                  Posted yesterday
                </div>
              </div>

            </div>
            <!-- /Card Columns -->

          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Pie Chart Example
              </div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Example Notifications Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bell-o"></i>
                Feed Example
              </div>
              <div class="list-group list-group-flush small">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <strong>David Miller</strong>
                      posted a new article to
                      <strong>David Miller Website</strong>.
                      <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <strong>Samantha King</strong>
                      sent you a new message!
                      <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <strong>Jeffery Wellings</strong>
                      added a new photo to the album
                      <strong>Beach</strong>.
                      <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                    <div class="media-body">
                      <i class="fa fa-code-fork"></i>
                      <strong>Monica Dennis</strong>
                      forked the
                      <strong>startbootstrap-sb-admin</strong>
                      repository on
                      <strong>GitHub</strong>.
                      <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                    </div>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  View all activity...
                </a>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Data Table Example
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Subcategoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Subcategoria</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach($prosdustos as $prosdusto)
                    <tr>
                        <td>{{$prosdusto->nombre}}</td>
                        <td><img src="{{asset($prosdusto ->imagen)}}" alt=""></td>
                        <td>{{$prosdusto->subcate->nombre}}</td>
                        <td><a href="{{ route('producto.edit', $prosdusto->id) }}" class = 'viewEdit btn btn-primary btn-xs'><i class = 'material-icons'>edit</i></td>
                        <td><a href="/producto/{!!$prosdusto->id!!}/delete" class = "delete btn btn-danger btn-xs"><i class = 'material-icons'>Borrar</i></a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
@endsection
