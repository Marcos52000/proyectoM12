@extends('admin.adminMaster')

@section('content')
	
<div class="container-fluid">
	<h2 class="mb-4">Categories-Gestió</h2>
	<a href="/categoria/create" class="btn btn-primary text-light mb-4">Crear categoria</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Categories</h6>
		
		
			<a style="display:inline-block" href="/categoria/export/" class="btn btn-success text-light float-right">
				<i class="fas fa-file-excel"></i>
			</a>
		
			<a style="display:inline-block" href="/categoria/export2/" class="btn btn-danger text-light float-right mr-2">
				<i class="fas fa-file-pdf"></i>
			</a>
				
		</div>
		<div class="card-body" style="overflow: hidden">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable">
				<thead>
					<tr>
						<th style="width:30px">Id</th>
						<th class="w-100">Categoria</th>
						<th class="w-100">Estat</th>
						<th style="max-width:100px">Editar</th>
						<th style="max-width:100px">Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($categories  as $categoria)
					<tr>
						<td>
							{{$categoria->id}}
						</td>
						<td>
							{{$categoria->categoria}}
						</td>
						<td>
							{{$categoria->estat}}
						</td>
						<td style="max-width:100px">

							<a href="/categoria/edit/{{$categoria->id}}" class="btn btn-primary text-light">
								<i class="fas fa-edit"></i>
							</a>
						</td>
						<td style="max-width:100px">
							<form action="/categoria/delete/{{$categoria->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar la categoria?');">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
							<button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
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

@endsection
