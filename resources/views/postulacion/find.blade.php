@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Ficha Postulante:</h1>
		<br>
		<table class="table table-striped" >
			@foreach($postulacion as $post)
				<tr>
					<td>
						Rut: {{$post->rut}}
					</td>
					<td>
						Email: {{$post->email}}
					</td>
				</tr>
				<tr>
					<td>
						Nombre: {{$post->nombre}}
					</td>
					<td>
						Dirección: {{$post->direccion}}
					</td>
				</tr>
				<tr>
					<td>
						Apellido Paterno: {{$post->apellido_paterno}}
					</td>
					<td>
						Comuna: {{$post->comuna}}
					</td>
				</tr>
				<tr>
					<td>
						Apellido Materno: {{$post->apellido_materno}}
					</td>
					<td>
						Educación: {{$post->educacion}}
					</td>
				</tr>
				<tr>
					<td>
						Fecha Nacimiento: {{$post->fecha_nacimiento}}
					</td>
					<td>
						Experiencia Laboral: {{$post->experiencia}}
					</td>
				</tr>	
				<tr>
					<td>
						Sexo: {{$post->sexo}}
					</td>
					<td>
						Modalidad: {{$post->modalidad}}
					</td>
				</tr>
				<tr>
					<td>
						Teléfono: {{$post->telefono}}
					</td>
					<td>
						Curso: {{$post->curso}}
					</td>
				</tr>
			@endforeach
		</table>
		<a class="btn btn-primary btn-lg btn-block" href="{{route('postulacion.index')}}">Volver</a>
	</div>
@endsection