@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Gestionar Cursos</h4>
	</div>
	<form action="{{ route('curso') }}" method="POST">
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		@error('curso')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="curso" class="form-label">Nombre Curso</label>
			<input type="text" name="curso" class="form-control" id="curso">
		</div>
		@error('cupo')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="cupo" class="form-label">Cupo Aprendices</label>
			<input type="number" name="cupo" class="form-control" id="cupo">
		</div>
		@error('aprendices')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="aprendices" class="form-label">Cupo Aprendices</label>
			<select name="aprendices[]" class="form-select" multiple aria-label="multiple select example">
				<option value="">Seleccione</option>
				@foreach($aprendices as $aprendiz)
				<option value="{{ $aprendiz->id }}">{{ $aprendiz->nombreAprendiz }} {{ $aprendiz->apellidoAprendiz }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Crear Curso</button>
		</div>
	</form>

	@foreach($cursos as $curso)	
	<div class="row py-1">
		<div class="col-md-9 d-flex align-items-center">
			<a href="{{ route('curso-edit',['id' => $curso->id]) }}">{{ $curso->nombreCurso }}</a>
		</div>
		<div class="col-md-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventana{{ $curso->id }}">
				Eliminar
			</button>
			<!-- Modal -->
			<div class="modal fade" id="ventana{{ $curso->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar Curso</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Esta seguro que quiere eliminar el curso <strong>{{ $curso->nombreCurso }}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<form action="{{ route('curso-destroy',['id' => $curso->id]) }}" method="POST">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection

