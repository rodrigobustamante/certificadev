@extends('layouts.app')

@section('content')
	@if(isset($postulacion))
		<div class="container" style="text-align: center;">
			<h3>
				Estado de solicitud: {{$postulacion->estado }}
			</h3>
			<strong>Rut del postulante: {{$postulacion->rut }}</strong>
			<br>
			<br>
			@if (Auth::user()->level == 0)
                <a class="btn btn-primary btn-lg btn-block" 
				href="{{route('postulacion.edit', $postulacion->id)}}">Editar</a>
            @else

            @endif
			<br>
			<a class="btn btn-primary btn-lg btn-block" 
			href="/buscar">Volver</a>
		</div>
	@endif
@endsection