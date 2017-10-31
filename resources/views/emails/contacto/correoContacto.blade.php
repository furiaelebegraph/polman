@component('mail::message')
# Hola, tienes un **correo nuevo** de

@component('mail::panel')
	{{$data['nombre']}}<br>
	{{$data['correo']}}<br>
	{{$data['mensaje']}}
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent