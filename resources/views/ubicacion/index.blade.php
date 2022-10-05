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

	@foreach($ubicaciones as $ubicacion)	
	<div class="row py-1">
		<div class="col-md-9 d-flex align-items-center">
			<a href="{{ route('ubicacion.show',['ubicacion' => $ubicacion->id]) }}">{{ $ubicacion->nombreUbicacion }} {{ $ubicacion->capacidadUbicacion }}</a>
		</div>
		<div class="col-md-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventana{{ $ubicacion->id }}">
				Eliminar
			</button>
			<!-- Modal -->
			<div class="modal fade" id="ventana{{ $ubicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar ubicacion</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Esta seguro que quiere eliminar el ubicacion <strong>{{ $ubicacion->nombreUbicacion }}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<form action="{{ route('ubicacion.destroy',['ubicacion' => $ubicacion->id]) }}" method="POST">
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
@endsection