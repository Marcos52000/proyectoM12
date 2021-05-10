@extends('admin.adminMaster')

@section('content')
	
<div class="container-fluid">
	<h2 class="mb-4">Cursos-Gestió</h2>
	<a href="/curs/create" class="btn btn-primary text-light mb-4">Crear curs</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Cursos</h6>
		
			<a style="display:inline-block" href="/curs/export/" class="btn btn-success text-light float-right">
				<i class="fas fa-file-excel"></i>
			</a>
		
			<a style="display:inline-block" href="/curs/export2/" class="btn btn-danger text-light float-right mr-2">
				<i class="fas fa-file-pdf"></i>
			</a>
				
			
		</div>
		<div class="card-body" style="overflow: hidden">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable">
				<thead>
					<tr>
					<th class="w-25">Id</th>
					<th class="w-100">Curs</th>
					<th class="w-50">Estat</th>
					<th style="max-width:100px">Editar</th>
					<th style="max-width:100px">Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($cursos  as $curs)
					<tr>
						<td>
							{{$curs->id}}
						</td>
						<td>
							{{$curs->curs}}
						</td>
						<td>
							{{$curs->estat}}
						</td>
						<td style="max-width:100px">

							<a href="/curs/edit/{{$curs->id}}" class="btn btn-primary text-light">
								<i class="fas fa-edit"></i>
							</a>
						</td>
						<td style="max-width:100px">
							<form action="/curs/delete/{{$curs->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar la categoria?');">
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
