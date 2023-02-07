@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
	<div class="card mb-4">
		<div class="card-header">
			Crear Productos
		</div>
		<div class="card-body">
			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="row">
				  	<div class="col">
						<div class="mb-3 row">
					  		<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
					  		<div class="col-lg-10 col-md-6 col-sm-12">
								<input name="name"  type="text" class="form-control">
							</div>
						</div>
				  	</div>
					<div class="col">
						<div class="mb-3 row">
							<label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio (€):</label>
							<div class="col-lg-10 col-md-6 col-sm-12">
								<input name="price" type="number" step="0.01" class="form-control">
							</div>
						</div>
				  	</div>
				</div>
				<div class="mb-3">
				  	<label class="form-label">Descripción</label>
				  	<textarea class="form-control" name="description" rows="3"></textarea>
				</div>
				<div class="mb-3">
				  	<label class="form-label">Imágen</label>
					<input type="file" class="form-control" name="image">
				</div>
				<button type="submit" class="btn btn-primary">Añadir</button>
			</form>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			Panel de control de productos
		</div>
		<div class="card-body">
			<!-- Table -->
			<div class="row">
				<div class="col-12">
					<table id="table" class="table table-striped table-dark">
						<thead>
							<tr>
								<th>Detalles</th>
								<th>ID</th>
								<th>Nombre</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($viewData['products'] as $product)
								<tr>
									<td>
										<form method="POST" action="{{route('admin.products.show', ['id' => $product["id"]])}}">
											<input type="hidden" name="name" value="{{$product -> getName()}}">
											<input type="hidden" name="price" value="{{$product -> getPrice()}}">
											<input type="hidden" name="description" value="{{$product -> getDescription()}}">
											<input type="hidden" name="image" value="{{$product -> getImage()}}">
											<button class='btn btn-info' type='submit'>
												<i class="bi bi-info-circle"></i>
											</button>
										</form>
									</td>
									<td>{{$product['id']}}</td>
									<td>{{$product['name']}}</td>
									<td>
										<form method="GET" action="{{route('admin.products.edit', ['id' => $product["id"]])}}">
											<button class='btn btn-secondary' type='submit'>
												<i class="bi bi-pencil"></i>
											</button>
										</form>
									</td>
									<td>
										<form method="POST" action="{{route('admin.products.delete', ['id' => $product["id"]])}}">
											@csrf
											@method('DELETE')
											<button class='btn btn-danger' type='submit' onclick="return confirm('¿Estás seguro de que quieres borrar el registro?')">
												<i class="bi bi-trash3"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/datatables.min.js" defer></script>
	<script>
		$(document).ready(function() {
			$('#table').DataTable({
				order: [[2, 'asc']],
				stateSave: true,
				"columnDefs": [
					{"className": "dt-center", "targets": "_all"},
					{orderable: false, targets: [0, 3, 4]}
				],
				pageLength : 5,
				language: {
				search: "Buscar:",
				lengthMenu: "Mostrando <select class='form-select form-select' aria-label='.form-select-lg example'>" +
					'<option value="5">5</option>'+
					'<option value="10">10</option>'+
					'<option value="15">15</option>'+
					'<option value="20">20</option>'+
					'<option value="25">25</option>'+
					'<option value="-1">Todos</option>'+
					'</select> productos',
				info: "Mostrando de _START_ a _END_ de _TOTAL_ productos",
				infoEmpty: "Mostrando 0 productos",
				infoFiltered: "(filtrado de _MAX_ productos totales)",
				zeroRecords: "No hay productos para mostrar",
				emptyTable: "No hay datos disponibles",
				paginate: {
					previous: "<i class='bi bi-arrow-left-short'></i>",
					next: "<i class='bi bi-arrow-right-short'></i>",
				},
				}
			});
		});
	</script>
@endsection