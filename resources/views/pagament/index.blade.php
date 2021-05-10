@extends('admin.adminMaster')

@section('content')

<div class="container-fluid">
	<h2 class="mb-4">Pagaments-Gestió</h2>
	<a href="/gpagament/create" class="btn btn-primary text-light mb-4">Crear Pagament</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Pagaments</h6>
	
			<a style="display:inline-block" href="/gpagament/export/" class="btn btn-success text-light float-right">
				<i class="fas fa-file-excel"></i>
			</a>
		
			<a style="display:inline-block" href="/gpagament/export2/" class="btn btn-danger text-light float-right mr-2">
				<i class="fas fa-file-pdf"></i>
			</a>
		</div>
		<div class="card-body" style="overflow: hidden">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable">
					<thead>
						<tr>
						<th style="width:30px">Id</th>
						<th style="width:50px">Categoria Id</th>
						<th style="width:300px">Compte Id</th>
						<th style="width:30px">Curs Id</th>
						<th style="width:300px">Titol</th>
						<th style="width:30px">Descripció</th>
						<th style="width:30px">Preu</th>
						<th style="width:30px">Data Inici</th>
						<th>Data fi</th>
						<th>Estat</th>
						<th style="max-width:100px">Editar</th>
						<th style="max-width:100px">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pagaments  as $pagament)
							<tr>
								<td>
									{{$pagament->id}}
								</td>

								<td>
									{{$pagament->categoria_id}}
								</td>	
				
								<td>
									{{$pagament->compte_id}}
								</td>
											
								<td>
									{{$pagament->compte_id}}
								</td>
						
								
								<td>
									{{$pagament->titol}}
								</td>
								<td>
									{{substr($pagament->descripcio,0,40)}}
								</td>
								<td>
									{{$pagament->preu }}
								</td>
								<td>
									{{$pagament->data_inici}}
								</td>
								<td>
									{{$pagament->data_fi}}
								</td>
								<td>
									{{$pagament->estat}}
								</td>		
							<td style="max-width:100px">
									
								<a href="/pagament/edit/{{$pagament->id}}" class="btn btn-primary text-light">
									<i class="fas fa-edit"></i>
								</a>
							</td>
							<td style="max-width:100px">
								<form action="/pagament/delete/{{$pagament->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar aquest pagament?');">
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
