@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Actualizar Aprendiz</h4>
	</div>
	<form action="{{ route('aprendiz.update',['aprendiz' => $aprendiz->id]) }}" method="POST">
		@method('PATCH')
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif

		@error('nombre')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="nombre" class="form-label">Nombre Aprendiz</label>
			<input type="text" name="nombre" value="{{ $aprendiz->nombreAprendiz }}" class="form-control" id="nombre">
		</div>

		@error('apellido')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="apellido" class="form-label">Apellido Aprendiz</label>
			<input type="text" name="apellido" value="{{ $aprendiz->apellidoAprendiz }}" class="form-control" id="apellido">
		</div>

		@error('documento')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="documento" class="form-label">Numero Documento Aprendices</label>
			<input type="number" name="documento" value="{{ $aprendiz->documentoAprendiz }}" class="form-control" id="documento">
		</div>

		@error('genero')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3 form-check">
			<label for="genero" class="form-label">Genero Aprendiz</label>
		</div>

		@php
			$estado = 'checked';
		@endphp

		<div class="mb-3 form-check">
			<input type="radio" name="genero" @if($aprendiz->genero == 'Femenino') {{ $estado }} @endif value="Femenino" class="form-check-input" id="generoAprendiz">
			<label for="genero" class="form-check-label">Femenino</label>
		</div>

		<div class="mb-3 form-check">
			<input type="radio" name="genero" @if($aprendiz->genero == 'Masculino') {{ $estado }} @endif value="Masculino" class="form-check-input" id="genero">
			<label for="generoAprendiz" class="form-check-label">Masculino</label>
		</div>

		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Actualizar Aprendiz</button>
		</div>
	</form>
</div>
@endsection
