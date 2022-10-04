@extends('app')
@section('content')
<div class="container w-50 mt-4 border border-3 p-4">
	<div class="mb-3">
		<h4>
			Desvincular Aprendices del Curso<br>
			{{ $curso->nombreCurso }}
		</h4>
		@if (session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>
		@endif
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Documento</th>
					<th scope="col">Apellidos</th>
					<th scope="col">Nombres</th>
					<th scope="col">Opcion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($aprendices as $aprendiz)
				<tr>
					<th scope="row">{{ $aprendiz->aprendiz_id }}</th>
					<td>{{ $aprendiz->documentoAprendiz }}</td>
					<td>{{ $aprendiz->apellidoAprendiz }}</td>
					<td>{{ $aprendiz->nombreAprendiz }}</td>
					<td>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ventana{{ $aprendiz->aprendiz_id }}">
							Desvincular
						</button>
						<!-- Modal -->
						<div class="modal fade" id="ventana{{ $aprendiz->aprendiz_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Desvincular Aprendices</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Esta seguro que quiere desvincular a <strong>{{ $aprendiz->apellidoAprendiz }} {{ $aprendiz->nombreAprendiz }}</strong>?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
										<form action="{{ route('aprendizcurso.destroy',['aprendizcurso'=>$aprendiz->aprendiz_curso_id]) }}" method="POST">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-danger">Desvincular</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection


