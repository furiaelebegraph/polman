<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/bulma.css')}}">
        <link rel="stylesheet" href="{{asset('css/general.css')}}">
        <!-- Styles -->
    </head>
    <body>
        <div class="fondo_polman">
            <div class="columns">
                <div class="column alin_cent">
                    <img class='logo_polman' src="{{asset('img/logo_polman.png')}}" alt="">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="linea_gris">
                        
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="bloque_enmedio">
                        
                    </div>
                </div>
            </div>
            <div class="formulario_pol centrado padding_formulario">
                <div class="">
                    <form  method='POST' action='{{url('enviar_correo')}}'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control">
                            <input type="text" name='nombre' class="input input_pol" id="exampleInputText" aria-describedby="nombreHelp" placeholder="Agregar nombre">
                            @if ($errors->has('nombre')) <p class="help-block">{{ $errors->first('nombre') }}</p> @endif
                        </div>

                        <div class="control">
                            <input type="email" name='correo' class="input input_pol" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agregar email">
                            @if ($errors->has('correo')) <p class="help-block">{{ $errors->first('correo') }}</p> @endif
                        </div>

                        <div class="control">
                            <textarea class="textarea input_pol" name='contenido' id="exampleTextarea" rows="3" placeholder="Escriba su mensaje"></textarea>
                            @if ($errors->has('contenido')) <p class="help-block">{{ $errors->first('contenido') }}</p> @endif
                        </div>

                        <div class="control alin_cent ">
                            <button type="submit" class=" btn_submit btn_enviar">ENVIAR MENSAJE</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="columns is-mobile is-centered">
            <div class="column is-half">
                @if (session('message'))
                    <div>
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="columns">
            <div class="column alin_cent">
                <img class='hornamento' src="{{asset('img/escudo.png')}}" alt="">
            </div>
        </div>

        <div class="columns fondo_light">
            <div class="column">
                <div class="columns">
                    <div class="column alin_cent">
                        <div class="catalogo_col">
                            CATÁLOGO
                        </div>
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-three-quarters">
                        <div class="columns is-multiline is-centered">
                            @foreach($productos as $producto)
                            <a class='column is-4 margen_30' href="detalle/{{$producto->id}}">
                                <div class="has-text-centered">
                                    <img src="{{$producto->imagen}}" alt="" class="al_70 recuadro">
                                    <div class="linea_gris_cat"></div>
                                    <h3 class='titulo_catalogo'>{{$producto->nombre}}</h3>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>   
            </div>
        </div>


        <div class="container margen_30">
            <div class="columns is-centered">
                <div class="column is-5 alin_cent">
                    <img class='al_70' src="{{asset('img/osa_mayor.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5 has-text-centered">
                    <hr>
                    <img class='logo_footer' src="{{asset('img/logo_polman_blanco.png')}}" alt="">
                </div>
            </div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>
        <script src="{{asset('js/general.js')}}"></script>
    </body>
</html>
