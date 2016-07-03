@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Buscador de solicitudes</h1>
		<br>
		<div  style="text-align:center;">
			<h4>Búsqueda por rut:</h4>
		 	{!! Form::open(array('url' => '/buscar')) !!}
		    {!! Form::token() !!}
		    {!! Form::label('rut', 'Rut:') !!}
		    {!! Form::text('rut') !!}
		    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
		    <br>
		    @if ($errors->has('rut'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('rut') }}</strong>
                    </span>
            @endif
		    {!! Form::close() !!}
		</div>
		<br>
		@if (Auth::user()->level == 0)
		<div style="text-align: center;">
			<h4>Búsqueda por fecha:</h4>
		 	{!! Form::open(array('url' => '/buscar')) !!}
		    {!! Form::token() !!}
		    {!! Form::label('fecha1', 'Desde:') !!}
		    {!! Form::date('fecha1') !!}
		    {!! Form::label('fecha2', 'Hasta:') !!}
		    {!! Form::date('fecha2') !!}
		    <br>
		    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
		    {!! Form::close() !!}
		</div>
			@if(isset($postulacion))
			<table class="table table-striped">
				<tr>
					<th>Rut</th>
					<th>Nombre</th>
					<th></th>
				</tr>
					
				<tr>
					<td>{{ $postulacion->rut }}</td>
					<td>{{ $postulacion->nombre }}</td>
					<td><a class="btn pull-left" href="{{route('postulacion.show', $postulacion->id)}}">Editar</a></td>
					
				</tr>
			</table>
			@endif
		@endif
	</div>
@endsection