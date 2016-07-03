@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Modificar postulación:</h1>
		{!! Form::model($postulacion, [
		    'method' => 'PATCH',
		    'route' => ['postulacion.update', $postulacion->id],
		    'class' => 'form-horizontal'
		]) !!}
		<br>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('rut', 'Rut:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('rut', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('rut'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('rut') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('nombre', 'Nombre:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('apellido_paterno', 'Apellido paterno:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('apellido_paterno'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('apellido_paterno') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('apellido_materno', 'Apellido materno:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('apellido_materno'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('apellido_materno') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('fecha_nacimiento'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('fecha_nacimiento') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('Sexo', 'Sexo:') !!}
			</div>
			<div class="col-md-6">
				<div class="radio-inline">
					{!! Form::radio('sexo', 'Masculino', true) !!} Masculino
				</div>
				<div class="radio-inline">
					{!! Form::radio('sexo', 'Femenino', false) !!} Femenino
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('telefono', 'Teléfono:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::number('telefono', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('telefono'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('correo', 'Email:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::email('correo', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('correo'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('correo') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('direccion', 'Dirección:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::text('direccion', null, ['class' => 'form-control']) !!}
			</div>
				@if ($errors->has('direccion'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('direccion') }}</strong>
                    </span>
                @endif
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('comuna', 'Comuna:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::select('comuna', array('Las Condes' => 'Las Condes', 'Providencia' => 'Providencia'), null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('comuna', 'Comuna:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::select('comuna', array('Las Condes' => 'Las Condes', 'Providencia' => 'Providencia'), null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('educacion', 'Educación:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::select('educacion', array('Profesional' => 'Profesional', 'Técnico' => 'Técnico', 'Media' => 'Media', 'Básica' => 'Básica', 'No posee' => 'No posee'), null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('experiencia', 'Ingrese cantidad de años:') !!}
			</div>
			<div class="col-md-6">
				{!! Form::number('experiencia', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<br>
		<div style="border: 1px black solid">
			<div class="form-group">
				<div class="col-md-4 control-label">
					<label class="control-label">Modalidad y Curso al que postula</label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label">
					{!! Form::label('modalidad', 'Modalidad:') !!}
				</div>
				<div class="col-md-6">
					{!! Form::select('modalidad', array('Diurno' => 'Diurno', 'Vespertino' => 'Vespertino'), null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-4 control-label">
					{!! Form::label('curso', 'Curso:') !!}
				</div>
				<div class="col-md-6">
					{!! Form::select('curso', array('Java' => 'Java', '.NET' => '.NET', 'PHP' => 'PHP'), null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-md-4 control-label">
				{!! Form::label('estado', 'Estado:') !!}
			</div>
			<div class="col-md-6">
				<div class="radio-inline">
					{!! Form::radio('estado', 'Pendiente', true) !!} Pendiente
				</div>
				<div class="radio-inline">
					{!! Form::radio('estado', 'Rechazado', false) !!} Rechazar
				</div>
				<div class="radio-inline">
					{!! Form::radio('estado', 'Aprobado', false) !!} Aprobar
				</div>
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
		<br>
		<a class="btn btn-primary btn-lg btn-block" href="{{route('postulacion.index')}}">Cancelar</a>
		<br>
		{!! Form::close() !!}
	</div>
@endsection