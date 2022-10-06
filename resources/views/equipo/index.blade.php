@extends('app')

@section('content')
<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Gestionar Equipos</h4>
	</div>
	<form action="{{ route('equipo.store') }}" method="POST">
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		@error('marca')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="marca" class="form-label">marca equipo</label>
			<input type="text" name="marca" class="form-control" id="marca">
		</div>
		@error('serial')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="serial" class="form-label">serial equipo</label>
			<input type="text" name="serial" class="form-control" id="serial">
		</div>
		@error('descripcion')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="descripcion" class="form-label">descripcion equipo</label>
			<input type="text" name="descripcion" class="form-control" id="descripcion">
		</div>
		@error('fechaCompra')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="fechaCompra" class="form-label">fechaCompra Aprendices</label>
			<input type="date" name="fechaCompra" class="form-control" id="fechaCompra">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Crear equipo</button>
		</div>
	</form>


    @foreach($equipos as $equipo)	
	<div class="row py-1">
		<div class="col-md-9 d-flex align-items-center">
			<a href="{{ route('equipo.show',['equipo' => $equipo->id]) }}">{{ $equipo->marcaEquipo }} {{ $equipo->descripcionEquipo}}</a>
		</div>
		<div class="col-md-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventana{{ $equipo->id }}">
				Eliminar
			</button>
			<!-- Modal -->
			<div class="modal fade" id="ventana{{ $equipo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Eliminar Equipo</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Esta seguro que quiere eliminar el equipo <strong>{{ $equipo->nombreEquipo }}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<form action="{{ route('equipo.destroy',['equipo' => $equipo->id]) }}" method="POST">
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