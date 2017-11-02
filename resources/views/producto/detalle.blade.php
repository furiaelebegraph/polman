@extends('layouts.app')

@section('cssgaleria')
	<link type="text/css" rel="stylesheet" href="{{asset('css/lightgallery.css')}}" /> 
@stop

@section('content')
	<div class="container">
		<div class="columns is-centered">
			<div class="column">
				{{ Breadcrumbs::render('potato', $producto) }}
			</div>
		</div>
	</div>
	<div class="container ">
		<div class="columns is-tablet is-centered is-gapless">
			<div class="column margen_30 is-8 is-flex">
				<div  >
					<div id="lightgallery" class="columns is-multiline is-mobile">
						@foreach($producto->ima as $imagenes)
						<a class='column is-4-mobile is-3-tablet' href="{{asset($imagenes->imagen)}}">
							<img src="{{asset($imagenes->imagen)}}" alt="">
						</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="column is-3 has-text-centered">
				 <div class="columns margen_30 is-multiline ">
				 	<div class="column is-11">
				 		<h2 class="titulo">
				 			{{$producto->nombre}}
				 		</h2>
				 		 <div class="margen_30"></div>
				 		<div class="linea_gris_cat"></div>
				 	</div>
					
					<div class="column is-11 alin_cent">
						<img class='hornamento' src="{{asset('img/escudo.png')}}" alt="">
					</div>
				 	{{-- 

				 	<div class="column is-11">
				 		{{$producto->precio}}
				 	</div> --}}
				 </div>
			</div>
		</div>
		<hr>
		<div class="columns is-centered is-four-fifths ">
			<div class="column margen_30">
				<h2 class='titulo_catalogo'>Descripcion</h2>
				
				<p class='color_gris'>
					{{$producto->descripcion}}
				</p>
			</div>
		</div>
	</div>
	<div class="container ">
		<div class="columns margen_30 is-centered">
			<div class="column is-6">
				<img class='al_100' src="{{asset('img/fondo_polamar_osos.jpg')}}" alt="">
			</div>
		</div>
	</div>
        <div class="container">
            <div class="columns margen_30 is-centered">
                <div class="column is-5 has-text-centered">
                    <hr>
                    <img class='logo_footer' src="{{asset('img/logo_polman_blanco.png')}}" alt="">
                </div>
            </div>
        </div>
@endsection

	@section('jsgaleria')
    <!-- flot charts scripts-->
	    <script src="{{asset('js/lightgallery.js')}}"></script>

	    <script src="{{asset('js/lg-fullscreen.js')}}"></script>
	    <script src="{{asset('js/lg-thumbnail.js')}}"></script>
	    <script src="{{asset('js/lg-zoom.js')}}"></script>
	@stop