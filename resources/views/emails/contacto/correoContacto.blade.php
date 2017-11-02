@component('mail::message')
# Hola, tienes un **correo nuevo** de

@component('mail::panel')
	{{$data['nombre']}}<br>
	{{$data['correo']}}<br>
	{{$data['contenido']}}
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent