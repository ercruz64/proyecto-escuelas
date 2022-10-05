@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Gestionar Ubicaciones</h4>
	</div>
	<form action="{{ route('ubicacion.store') }}" method="POST">
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		@error('ubicacion')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="ubicacion" class="form-label">Nombre ubicacion</label>
			<input type="text" name="ubicacion" class="form-control" id="ubicacion">
		</div>
		@error('capacidad')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="capacidad" class="form-label">capacidad Aprendices</label>
			<input type="number" name="capacidad" class="form-control" id="capacidad">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Crear ubicacion</button>
		</div>
	</form>


@endsection