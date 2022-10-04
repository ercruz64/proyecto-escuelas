@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Asignar Aprendices a Cursos</h4>
	</div>
	<form action="" method="POST">
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif

		<div class="mb-3">
			<label for="" class="form-label">Seleccione un Curso</label>
			<select name="curso_id" class="form-select">
				<option value="">Seleccione</option>
				@foreach($cursos as $curso)
				<option value="{{ $curso->id }}">{{ $curso->nombreCurso }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Seleccione los Aprendices</label>
			<select name="aprendiz_id[]" class="form-select" multiple aria-label="multiple select example">
				<option value="">Seleccione</option>
				@foreach($aprendices as $aprendiz)
				<option value="{{ $aprendiz->id }}">{{ $aprendiz->nombreAprendiz }} {{ $aprendiz->apellidoAprendiz }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Asignar Aprendices al Curso</button>
		</div>
	</form>
	@foreach($aprendizCursos as $curso)	
	<div class="row py-1">
		<div class="col-md-9 d-flex align-items-center">
			<a href="{{ route('aprendizcurso.edit',['aprendizcurso' => $curso->curso_id]) }}">{{ $curso->nombreCurso }}</a>
		</div>
	</div>
	@endforeach
</div>
@endsection

