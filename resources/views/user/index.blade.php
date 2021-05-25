@extends('admin.adminMaster')

@section('content')

<div class="container-fluid">
	<h2 class="mb-4">Usuaris-Gestió</h2>
	<a href="/user/create" class="btn btn-primary text-light mb-4">Crear usuari</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			
			<h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Usuaris</h6>
		
			<a style="display:inline-block" href="/user/export/" class="btn btn-success text-light float-right">
				<i class="fas fa-file-excel"></i>
			</a>
	
			<a style="display:inline-block" href="/user/export2/" class="btn btn-danger text-light float-right mr-2">
				<i class="fas fa-file-pdf"></i>
			</a>
	
		</div>
		<div class="card-body" style="overflow: hidden">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
						<th style="width: 25px">Id</th>
						<th style="width: 150px">Usuaris</th>
						<th style="width: 150px">Contrasenya</th>
						<th style="width: 150px">Correu Electronic</th>
						<th style="width: 150px">Rol</th>
						<th style="width: 50px" >Editar</th>
						<th style="width: 50px">Eliminar</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($usuarios  as $user)
						@if($user->estat == 'Actiu')
							<tr>
								<td>
									{{$user->id}}
								</td>
								<td>
									{{$user->user}}
								</td>
								<td>
									{{ substr($user->password, 0,  20) }}
								</td>
								<td>
									{{$user->email}}
								</td>
								<td>
									{{$user->rol}}
								</td>
								<td style="max-width:100px">
					
									<a href="/user/edit/{{$user->id}}" class="btn btn-primary text-light">
										<i class="fas fa-edit"></i>
									</a>
								</td>
								<td style="max-width:100px">
									<form action="/user/delete/{{$user->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar aquest usuari?');">
										{{ method_field('DELETE') }}
										{{ csrf_field() }}
									<button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
									</form>
								</td>
							</tr>
						@endif
					@endforeach
					</tbody>
				</table>
			</div>



@endsection
