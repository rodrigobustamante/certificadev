@extends('layouts.app')

@section('content')
	<div class="container">

		<h1>Listado de postulaciones:</h1>

		<table class="table table-striped">
			<tr>
				<th>Rut</th>
				<th>Nombre</th>
				<th>Estado</th>
				<th></th>
			</tr>
			@foreach($postulaciones as $postulacion)
				
				<tr>
					<td>
						{{$postulacion->rut}}
					</td>
					<td>
						{{$postulacion->nombre}}
						{{$postulacion->apellido_paterno}}
						{{$postulacion->apellido_materno}}
					</td>
					<td>
						{{$postulacion->estado}}
					</td>
					<td>
						<a class="btn pull-left" href="{{route('postulacion.show', $postulacion->id)}}">Ver</a>
						<a class="btn pull-left" href="{{route('postulacion.edit', $postulacion->id)}}">Editar</a>
						{{ Form::open(array('url' => 'postulacion/' . $postulacion->id, 'class' => 'pull-left')) }}
		                    {{ Form::hidden('_method', 'DELETE') }}
		                    {{ Form::submit('Eliminar', array('class' => 'btn btn-link')) }}
		                {{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection