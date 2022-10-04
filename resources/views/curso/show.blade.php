@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Actualizar Cursos</h4>
	</div>
	<form action="{{ route('curso-edit',['id' => $curso->id]) }}" method="POST">
		@method('PATCH')
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		@error('curso')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="curso" class="form-label">Nombre Curso</label>
			<input type="text" name="curso" value="{{ $curso->nombreCurso }}" class="form-control" id="curso">
		</div>
		@error('cupo')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="cupo" class="form-label">Cupo Aprendices</label>
			<input type="number" name="cupo" value="{{ $curso->cupo }}" class="form-control" id="cupo">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Actaulizar Curso</button>
		</div>
	</form>
</div>
@endsection


