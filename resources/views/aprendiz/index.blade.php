@extends('app')

@section('content')

<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Registrar Aprendices</h4>
	</div>
	<form action="{{ route('aprendiz.store') }}" method="POST">
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif

		@error('nombre')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="nombre" class="form-label">Nombre Aprendiz</label>
			<input type="text" name="nombre" class="form-control" id="nombre">
		</div>

		@error('apellido')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="apellido" class="form-label">Apellido Aprendiz</label>
			<input type="text" name="apellido" class="form-control" id="apellido">
		</div>

		@error('documento')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="documento" class="form-label">Numero Documento Aprendices</label>
			<input type="number" name="documento" class="form-control" id="documento">
		</div>

		@error('genero')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3 form-check">
			<label for="genero" class="form-label">Genero Aprendiz</label>
		</div>

		<div class="mb-3 form-check">
			<input type="radio" name="genero" value="Femenino" class="form-check-input" id="generoAprendiz">
			<label for="genero" class="form-check-label">Femenino</label>
		</div>

		<div class="mb-3 form-check">
			<input type="radio" name="genero" value="Masculino" class="form-check-input" id="generoAprendiz">
			<label for="genero" class="form-check-label">Masculino</label>
		</div>

		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Crear Aprendiz</button>
		</div>
	</form>

	@if ($aprendices->count() > 0)
	@foreach ($aprendices as $aprendiz)
	<div class="row py-1">
		<div class="col-md-9 d-flex align-items-center">
			<a href="{{ route('aprendiz.show', ['aprendiz' => $aprendiz->id]) }}">{{ $aprendiz->nombreAprendiz }} {{ $aprendiz->apellidoAprendiz }}</a>
		</div>

		<div class="col-md-3 d-flex justify-content-end">

			<!-- Button trigger modal -->
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventana{{ $aprendiz->id }}">
				Eliminar
			</button>

			<!-- Modal -->
			<div class="modal fade" id="ventana{{ $aprendiz->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar aprendiz</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Esta seguro que quiere eliminar el aprendiz <strong>{{ $aprendiz->nombreAprendiz }} {{ $aprendiz->apellidoAprendiz }}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<form action="{{ route('aprendiz.destroy',['aprendiz' => $aprendiz->id]) }}" method="POST">
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
	@else
	No hay aprendices registrados...		
	@endif


</div>


@endsection