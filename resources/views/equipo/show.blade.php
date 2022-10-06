@extends('app')

@section('content')
<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>Actualizar Equipo</h4>
	</div>
	<form action="{{ route('equipo.update',['equipo' => $equipo->id]) }}" method="POST">
		@method('PATCH')
		@csrf
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		@error('marca')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="marca" class="form-label">Marca Equipo</label>
			<input type="text" name="marca" value="{{ $equipo->marcaEquipo }}" class="form-control" marca="marca">
		</div>
		@error('serial')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="serial" class="form-label">Serial Equipo</label>
			<input type="text" name="serial" value="{{ $equipo->serialEquipo }}" class="form-control" serial="serial">
		</div>
		@error('descripcion')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="descripcion" class="form-label">Descripcion Equipo</label>
			<input type="text" name="descripcion" value="{{ $equipo->descripcionEquipo }}" class="form-control" descripcion="descripcion">
		</div>
		@error('fechaCompra')
		<h5 class="alert alert-danger">{{ $message }}</h5>
		@enderror
		<div class="mb-3">
			<label for="fechaCompra" class="form-label">Fecha Compra</label>
			<input type="date" name="fechaCompra" value="{{ $equipo->fechaCompraEquipo }}" class="form-control" fechaCompra="fechaCompra">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">Actaulizar Equipo</button>
		</div>
	</form>
</div>
@endsection